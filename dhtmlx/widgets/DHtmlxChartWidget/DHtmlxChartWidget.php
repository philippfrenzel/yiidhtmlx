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
class DHtmlxChartWidget extends DHtmlxBaseWidget
{
    /**
     * All scripts that should additionally be loaded by this widget.
     * You have to include folder names if the scripts are within the e.g.: "ext" folder
     * Example: "array('ext/somescript.js')"
     *
     * @var array
     */
    public $scripts = array(
        'codebase/dhtmlxchart.js',
        'codebase/thirdparty/excanvas/excanvas.js',
        //'codebase/dhtmlxchart_debug.js'
    );
    /**
     * All css files that should additionally be loaded by this widget.
     * You have to include folder names if the scripts are within the e.g.: "ext" folder
     * Example: "array('ext/somecss.css')"
     *
     * @var array
     */
    public $css = array(
        'codebase/dhtmlxchart.css',
        //'codebase/dhtmlxchart_debug.css'
    );
    /**
    * default options
    *
    * @var mixed
    */
    protected $defaultOptions=array(
        'view'             => 'bar',
        'value'            => '#sales#',    //JSON var name -> see sample object dataURL
        'label'            => '#bike#'
    );
    /**
     * Data url used for fetching data
     *
     * @var string
     */
    public $dataUrl;
    /**
     * Data type used (e.g.: XML, JSON). Defaults to "json"
     *
     * @var string
     * [
     * { id:”1”, sales:7.4, year:"2006" },
     * { id:”2”, sales:9.0, year:"2007" },
     * { id:”3”, sales:7.3, year:"2008" },
     * { id:”4”, sales:7.6, year:"2009" }
     * ];
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
     */
    public $events = array();
    
    /**
    * initialize widget
    *
    */
    public function init()
    {
        //lets put this into the document head
        $this->customScriptPosition = CClientScript::POS_END;

        //dont add image path option!
        $this->setImagePath = false;

        //check needed values
        if(!isset($this->dataUrl))
        {
            throw new CException("You have to define a dataUrl!",500);
        }
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
            'container'   => $this->id,
        ));
        //merge options with default options
        $this->options=CMap::mergeArray($this->defaultOptions,$this->options);
        
        //publish assets
        parent::init();
    }

    protected function customScript()
    {
        $options = CJavaScript::encode($this->options);
        ob_start();

        echo 'var ' .$this->id. '= new dhtmlXChart('.$options.');';

        //loading data        
        echo $this->id. '.load("'.$this->dataUrl.'","'.strtolower($this->dataType).'");';
        
        /*foreach ($this->events as $event => $handler)
            echo $this->id. ".attachEvent('{$event}', " . CJavaScript::encode($handler) . ");";*/

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
        return $this->assetPath=Yii::app()->assetManager->publish(dirname(__FILE__).DIRECTORY_SEPARATOR.'assets');
    }
}