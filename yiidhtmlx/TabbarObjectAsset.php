<?php

namespace yiidhtmlx;

use yii\web\AssetBundle;

/**
 * @link http://www.frenzel.net/
 * @author Philipp Frenzel <philipp@frenzel.net> 
 */

class TabbarObjectAsset extends AssetBundle
{
    public $sourcePath = '@yiidhtmlx/assets';
    public $css = array(
        'dhtmlxTabbar/dhtmlxtabbar.css',
    );
    public $js = array(
        'dhtmlxTabbar/dhtmlxtabbar.js',
        'dhtmlxTabbar/dhtmlxcontainer.js',
        'dhtmlxTabbar/dhtmlxtabbar_start.js',
    );
    public $depends = array(
        '\yiidhtmlx\WidgetAsset',
    );
}
