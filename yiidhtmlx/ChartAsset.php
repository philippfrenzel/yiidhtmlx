<?php

namespace yiidhtmlx;

use yii\web\AssetBundle;

/**
 * @link http://www.frenzel.net/
 * @author Philipp Frenzel <philipp@frenzel.net> 
 */

class ChartAsset extends AssetBundle
{
    public $sourcePath = '@yiidhtmlx/assets';
    public $css = array(
        'dhtmlxChart/dhtmlxchart.css'
    );
    public $js = array(
        'dhtmlxChart/dhtmlxchart.js'
    );
    public $depends = array(
        '\yiidhtmlx\WidgetAsset'
    );
}
