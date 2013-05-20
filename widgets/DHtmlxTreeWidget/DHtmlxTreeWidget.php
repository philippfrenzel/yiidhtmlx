<?php
require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'DHtmlxBaseWidget'.DIRECTORY_SEPARATOR.'DHtmlxBaseWidget.php');
/**
 * Renders a DHtmlxTree widget at the position the widget is configured.
 * The widget gets configured through the options array which will take the same key/value
 * definitions as the javascript equivalent.
 * For information which options are possible take a look at
 * @link http://docs.dhtmlx.com/doku.php?id=dhtmlxtree:api_constructor_object
 * @copyright Frenzel GmbH - www.frenzel.net
 *
 * @author Johannes "Haensel" Bauer <johannes@codecrumbs.at>
 * @author Philipp Frenzel <philipp@frenzel.net>
 */
class DHtmlxTreeWidget extends DHtmlxBaseWidget
{
    /**
     * All scripts that should additionally be loaded by this widget.
     * You have to include folder names if the scripts are within the e.g.: "ext" folder
     * Example: "array('ext/somescript.js')"
     *
     * @var array
     */
    public $scripts = array(
        'codebase/dhtmlxtree.js',
        'codebase/ext/dhtmlxtree_json.js',
        'codebase/ext/dhtmlxtree_dragin.js',
        'codebase/ext/dhtmlxtree_xw.js',
    );
    /**
     * All css files that should additionally be loaded by this widget.
     * You have to include folder names if the scripts are within the e.g.: "ext" folder
     * Example: "array('ext/somecss.css')"
     *
     * @var array
     */
    public $css = array(
        'codebase/dhtmlxtree.css',
    );
    /**
    * default options
    *
    * @var mixed
    */
    protected $defaultOptions=array(
        'width'            => '100%',
        'height'           => '100%',
        'rootId'           => 0,
        'skin'             => 'terrace',
        'checkbox'         => true
    );
    /**
     * Wheter to enable lazy loading or not. Defaults to false
     *
     * @var boolean
     */
    public $lazyLoad = false;
    /**
     * Data url used for fetching data
     *
     * @var string
     */
    public $dataUrl;
    /**
     * enable drag n drop
     *
     * @var string
     */
    public $enableDragAndDrop = false;
    /**
     * enable drag n drop
     *
     * @var string
     */
    public $enableMercyDrag = false;
    /**
     * expandnode drag n drop
     *
     * @var string = 0
     */
    public $openAllItems = -1;
    /**
     * Data type used (e.g.: XML, JSON). Defaults to "json"
     *
     * @var string
     */
    public $dataType = "json";
    /**
     * Events used to get the events for the tree
     *
     * @var array
     *<pre>
     *  'events'=>array(
     *  'onClick'=>'js:function(nodeId, event) {
     *      console.log(nodeId);
     * }',
     *</pre>
     *<pre>
     *  'events'=>array(
     *  'onDragIn'=>'js:function(dId,lId,sObject,tObject){
     *      console.log(nodeId);
     * }',
     *</pre>
     *<pre>
     *  'events'=>array(
     *  'onDrag'=>'js:function(sId,tId,id,sObject,tObject){
     *      console.log(nodeId);
     * }',
     *</pre>
     *<pre>
     *  'events'=>array(
     *  'onDrop'=>'js:function(sId,tId,id,sObject,tObject){
     *      console.log(nodeId);
     * }',
     *</pre>
     */
    public $events = array();
    /**
     * Mappings used to get the correct image folder of a defined skin
     *
     * @var array
     */
    protected $skinToImgFolderMappings = array(
        'bluebooks'   => 'csh_bluebooks',
        'bluefolders' => 'csh_bluefolders',
        'books'       => 'csh_books',
        'skyblue'     => 'csh_dhx_skyblue',
        'terrace'     => 'csh_dhx_terrace',
        'scbrblue'    => 'csh_scbrblue',
        'vista'       => 'csh_vista',
        'winstyle'    => 'csh_winstyle',
        'yellowbook'  => 'csh_yellowbooks',
    );

    /**
    * initialize widget
    *
    */
    public function init()
    {
        //check needed values
        if(!isset($this->dataUrl))
        {
            throw new CException("You have to define a dataUrl!",500);
        }
        //set additional default options that only make sense after initialization
        $this->defaultOptions = CMap::mergeArray($this->defaultOptions,array(
            'parent'   => $this->id,
        ));
        //merge options with default options
        $this->options=CMap::mergeArray($this->defaultOptions,$this->options);
        //set correct image path according to skin if not set already
        if(!isset($this->options['image_path']))
        {
            $this->options['image_path'] = $this->getAssetPath().'/codebase/imgs/'.$this->skinToImgFolderMappings[$this->options['skin']].'/';
        }
        parent::init();
    }

    protected function customScript()
    {
        $options = CJavaScript::encode($this->options);
        ob_start();
        echo 'var ' .$this->id. '= new dhtmlXTreeObject('.$options.');';
        
        if($this->enableDragAndDrop){
            echo $this->id. '.enableDragAndDrop(true, true);';
            echo $this->id. '.makeAllDraggable();';
        }

        if($this->enableMercyDrag)
            echo $this->id. '.enableMercyDrag(true);';

        foreach ($this->events as $event => $handler)
            echo $this->id. ".attachEvent('{$event}', " . CJavaScript::encode($handler) . ");";
        
        if($this->lazyLoad)
        {
            echo $this->id. '.setXMLAutoLoading("'.$this->dataUrl.'");';
            echo $this->id. '.setDataMode("'.$this->dataType.'");';
            echo $this->id. '.load'.strtoupper($this->dataType).'("'.$this->dataUrl.'");';
            echo $this->id. '.enableSmartXMLParsing(true);';
        }
        else
        {
            echo $this->id. '.load'.strtoupper($this->dataType).'("'.$this->dataUrl.'");';

        }

        if($this->openAllItems >= 0)
            echo $this->id. '.openAllItems('.$this->openAllItems.');';
        else
            echo $this->id. '.loadOpenStates();';

        return ob_get_clean();
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
        return $this->assetPath = Yii::app()->assetManager->publish(dirname(__FILE__).DIRECTORY_SEPARATOR.'assets');
    }
}