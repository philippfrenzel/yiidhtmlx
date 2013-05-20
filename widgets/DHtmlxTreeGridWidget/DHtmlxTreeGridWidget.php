<?php
require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'DHtmlxBaseWidget'.DIRECTORY_SEPARATOR.'DHtmlxBaseWidget.php');
/**
 * Renders a DHtmlxGrid widget at the position the widget is configured.
 * The widget gets configured through the options array which will take the same key/value
 * definitions as the javascript equivalent.
 * For information which options are possible take a look at
 * @link http://docs.dhtmlx.com/doku.php?id=dhtmlxgrid:api_constructor_object
 * @copyright Frenzel GmbH - www.frenzel.net
 *
 * @author Johannes "Haensel" Bauer <johannes@codecrumbs.at>
 * @author Philipp Frenzel <philipp@frenzel.net>
 */
class DHtmlxTreeGridWidget extends DHtmlxBaseWidget
{
    /**
     * All scripts that should additionally be loaded by this widget.
     * You have to include folder names if the scripts are within the e.g.: "ext" folder
     * Example: "array('ext/somescript.js')"
     *
     * @var array
     */
    public $scripts = array(
        'codebase/dhtmlxgrid.js',
        'codebase/dhtmlxgridcell.js',
        'codebase/ext/dhtmlxgrid_drag.js',
        'codebase/ext/dhtmlxgrid_json.js',
        'codebase/ext/dhtmlx_extdrag.js',
        'codebase/ext/dhtmlxgrid_mcol.js',
        'codebase/ext/dhtmlxgrid_keymap_excel.js',
        'codebase/dhtmlxtreegrid.js',        
    );
    /**
     * All css files that should additionally be loaded by this widget.
     * You have to include folder names if the scripts are within the e.g.: "ext" folder
     * Example: "array('ext/somecss.css')"
     *
     * @var array
     */
    public $css = array(
        'codebase/dhtmlxgrid.css',
        'codebase/dhtmlxgrid_skins.css',
        'codebase/ext/dhtmlx_extdrag.css',
    );
    /**
    * default options
    *
    * @var mixed
    */
    protected $defaultOptions=array(
        'skin'              => 'dhx_terrace',  //possible skins dhx_skyblue, dhx_terrace
        'auto_height'       => true,
        'auto_width'        => true,
        'editable'          => true,
        'without_header'    => false,
        'multiselect'       => false,

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
     */
    public $dataType = "json";


    
    //need this for parsing csv files
    public $cellDelimiter = NULL;
    public $rowDelimiter = NULL;


    /**
     * Keyboard Navigation Yes/No
     *
     * @var string
     */
    public $enableKeyboardSupport = true;


    /**
     * Drag n Drop Yes/No
     *
     * @var string
     */
    public $enableDragAndDrop = false;

     /**
     * Columns used in the grid
     *
     * @var array
     *
     * allowed fields:
     * label => "Column A",
     * width => 100,
     * type => int,
     * sort => int,
     * align => "right",
     */
    public $columns = array(
            array('label'=>'id'),
        );

    /**
     * Events used to get the events for the tree
     *
     * @var array
     */
    public $events = array();

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
            'parent'        => $this->id,
            'image_path'    => $this->getAssetPath().'/codebase/imgs/',
            'keymap'        => $this->enableKeyboardSupport,
            'drag'          => $this->enableDragAndDrop,
        ));

        //init columns
        $this->options = CMap::mergeArray($this->options,array(
                'columns'    => $this->columns,
            )
        );

        //merge options with default options
        $this->options=CMap::mergeArray($this->defaultOptions,$this->options);
        

        //merge skin css to base css
        $this->css = CMap::mergeArray($this->css,array(
                'codebase/skins/dhtmlxgrid_'.$this->options['skin'].'.css'
                )
        );

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
        
        echo 'var ' .$this->id. '= new dhtmlXGridObject('.$options.');';

        if(!is_Null($this->cellDelimiter))
            echo $this->id.'.csv.cell = "'.$this->cellDelimiter.'";';

        echo $this->id. '.load("'.$this->dataUrl.'","'.strtolower($this->dataType).'");';

        foreach ($this->events as $event => $handler)
            echo $this->id. ".attachEvent('{$event}', " . CJavaScript::encode($handler) . ");";

        return ob_get_clean();
    }
}