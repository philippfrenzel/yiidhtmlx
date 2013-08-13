<?php

namespace yiidhtmlx;

use yii\web\AssetBundle;

/**
 * @link http://www.frenzel.net/
 * @author Philipp Frenzel <philipp@frenzel.net> 
 */

class GridObjectAsset extends AssetBundle
{
    public $sourcePath = '@yiidhtmlx/assets';
    public $css = array(
        'dhtmlxGrid/dhtmlxgrid.css',
        'dhtmlxGrid/skins/dhtmlxgrid_skins.css',
        'dhtmlxGrid/skins/dhtmlxgrid_dhx_terrace.css',        
    );
    public $js = array(
        'dhtmlxGrid/dhtmlxgrid.js',
        'dhtmlxGrid/dhtmlxgridcell.js',
        'dhtmlxGrid/ext/dhtmlxgrid_srnd.js',
        'dhtmlxGrid/ext/dhtmlxgrid_filter.js',
    );
    public $depends = array(
        '\yiidhtmlx\WidgetAsset',
    );
}
