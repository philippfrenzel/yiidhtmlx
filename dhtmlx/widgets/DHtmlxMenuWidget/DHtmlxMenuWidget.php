<?php
require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'DHtmlxBaseWidget'.DIRECTORY_SEPARATOR.'DHtmlxBaseWidget.php');
/**
 * Renders a DHtmlxTree widget at the position the widget is configured.
 * The widget gets configured through the options array which will take the same key/value
 * definitions as the javascript equivalent.
 * For information which options are possible take a look at
 * @link http://docs.dhtmlx.com/doku.php?id=dhtmlxmenu:api_constructor_object
 * @copyright Frenzel GmbH - www.frenzel.net
 *
 * @author Johannes "Haensel" Bauer <johannes@codecrumbs.at>
 * @author Philipp Frenzel <philipp@frenzel.net>
 */
class DHtmlxMenuWidget extends DHtmlxBaseWidget
{
    public $scripts = array(
        'codebase/dhtmlxmenu.js',
        'codebase/ext/dhtmlxmenu_ext.js',
    );
    public $css = array(
        'codebase/skins/',
    );
    /**
    * default options
    *
    * @var mixed
    */
    protected $defaultOptions=array(
        'skin'                  => 'dhx_terrace',
        'context'               => true,
        'caption'               => 'Context',
    );
    /**
     * Path where assets are stored publicly
     *
     * @var string
     */
    protected $assetPath;
    /**
     * Items to be displayed in the menu
     *
     * @var JSON Menu
     *<
     */
    public $items = array();
    /**
     * Mappings used to get the correct image folder of a defined skin
     *
     * @var array
     */
    protected $skinToImgFolderMappings = array(
        'dhx_black'             => 'dhtmlxmenu_dhx_black',
        'dhx_blue'              => 'dhtmlxmenu_dhx_blue',
        'dhx_skyblue'           => 'dhtmlxmenu_dhx_skyblue',
        'dhx_terrace'           => 'dhtmlxmenu_dhx_terrace',
        'dhx_web'               => 'dhtmlxmenu_dhx_web',
    );

    /**
    * initialize widget
    *
    */
    public function init()
    {
        //check needed values
        /*if(!isset($this->dataUrl))
        {
            throw new CException("You have to define a dataUrl!",500);
        }*/
        //get widget id
        if(isset($this->htmlOptions['id']))
        {
            $id=$this->htmlOptions['id'];
        }
        else
        {
            $this->htmlOptions['id']=$this->getId();
        }
        //set additional default options that only make sense after initialization
        $this->defaultOptions = CMap::mergeArray($this->defaultOptions,array(
            'parent'   => $this->id,
        ));
        //merge options with default options
        $this->options=CMap::mergeArray($this->defaultOptions,$this->options);
        //set correct image path according to skin if not set already
        if(!isset($this->options['icon_path']))
        {
            $this->options['icon_path'] = $this->getAssetPath().'/codebase/imgs/'.$this->skinToImgFolderMappings[$this->options['skin']].'/';
        }
        //set correct image path according to skin if not set already
        if(!isset($this->options['image_path']))
        {
            $this->options['image_path'] = $this->getAssetPath().'/codebase/imgs/'.$this->skinToImgFolderMappings[$this->options['skin']].'/';
        }
        $this->options['items'] = array(array('id'=>'file', 'text'=>'File','items'=>array(array('id'=>'fileopen', 'text'=>'Open File'))));
        //publish assets
        parent::init();
    }

    /**
     * Returns the asset path of this widget and if none exists yet, creates one
     * and returns the path to the newly created folder under /assets
     *
     */
    protected function getAssetPath()
    {
        if(isset($this->assetPath))
        {
            return $this->assetPath;
        }
        //not published yet, so publish the files that are within the "assets" folder to the app's assets folder
        //and return the path
        return $this->assetPath=Yii::app()->assetManager->publish(dirname(__FILE__).DIRECTORY_SEPARATOR.'assets');
    }

    protected function customScript()
    {
        $options = CJavaScript::encode($this->options);
        ob_start();
            echo 'var ' .$this->id. '= new dhtmlXMenuObject('.$options.');';
            echo $this->id. '.addContextZone("dv_dataview");';
        return ob_get_clean();
    }
}