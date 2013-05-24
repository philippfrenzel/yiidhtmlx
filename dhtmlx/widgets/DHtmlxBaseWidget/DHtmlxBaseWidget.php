<?php
/**
 *
 * PLANLOGIQ -> ;)
 * The abstract base class holding the logic shared by all dhtmlx widgets
 * @copyright Frenzel GmbH - www.frenzel.net
 *
 * @author Johannes "Haensel" Bauer <johannes@codecrumbs.at>
 */
abstract class DHtmlxBaseWidget extends CWidget
{
    /**
    * html options for container div tag
    *
    * @var mixed
    */
    public $htmlOptions=array();
    /**
    * options for initialization
    *
    * @var mixed
    */
    public $options = array();
    /**
     * All scripts that should additionaly be loaded.
     * You have to include folder names if the scripts are within the e.g.: "ext" folder
     * Example: "array('ext/somescript.js')"
     *
     * @var array
     */
    public $scripts = array();
    /**
     * All css files that should additionaly be loaded.
     * You have to include folder names if the css files are within the e.g.: "ext" folder
     * Example: "array('ext/somecss.css')"
     *
     * @var array
     */
    public $css = array();
    /**
     * Set the position of the script (via CClientScript::POS_XYZ)
     *
     * @var int
     */
    public $customScriptPosition = CClientScript::POS_END;
    /**
    * default options
    *
    * @var mixed
    */
    protected $defaultOptions = array();
    /**
     * Path where assets are stored publicly
     *
     * @var string
     */
    protected $assetPath;

    /**
    * Do this component use the image path?
    */

    protected $setImagePath = true;

    /**
    * initialize widget
    *
    */
    public function init()
    {
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
        if($this->setImagePath){
            $this->defaultOptions = CMap::mergeArray($this->defaultOptions,array(
                'image_path' => $this->getAssetPath().'/codebase/imgs/',
            ));
        }
        //merge options with default options
        $this->options=CMap::mergeArray($this->defaultOptions,$this->options);
        //publish assets
        $this->publishAssets();
    }

    /**
    * runs the widget and renders the div the holds the grid
    *
    */
    public function run()
    {
        echo CHtml::openTag('div',$this->htmlOptions);
        echo CHtml::closeTag('div');
    }

    /**
     * Returns the asset path of this widget and if none exists yet, creates one
     * and returns the path to the newly created folder under /assets
     *
     */
    abstract protected function getAssetPath();

    /**
     * Published all assets needed by the grid
     *
     */
    protected function publishAssets()
    {
        //REGISTER SCRIPTS
        $this->registerScripts();
        $this->registerCustomScripts();

        //REGISTER CSS
        $this->registerCss();
    }

    protected function registerScripts()
    {
        $cs = Yii::app()->getClientScript();
        //include additional scripts
        foreach($this->scripts as $script)
        {
            $cs->registerScriptFile($this->getAssetPath().DIRECTORY_SEPARATOR.$script);
        }
    }

    protected function registerCustomScripts()
    {
        $cs = Yii::app()->getClientScript();
        if($this->customScript() != "")
        {
            $cs->registerScript(__CLASS__.$this->id,$this->customScript(),$this->customScriptPosition);
        }
        $cs = Yii::app()->getClientScript();
    }

    protected function registerCss()
    {
        $cs = Yii::app()->getClientScript();
        //Include base files
        foreach($this->css as $css)
        {
            $cs->registerCssFile($this->getAssetPath().DIRECTORY_SEPARATOR.$css);
        }
    }

    /**
     * Creates the javascript needed for this widget
     *
     * @var string the javascript as a string
     */
    protected function customScript()
    {
        return "";
    }
}