<?php

namespace yiidhtmlx;

use yii\web\AssetBundle;

/**
 * @link http://www.frenzel.net/
 * @author Philipp Frenzel <philipp@frenzel.net> 
 */

class PopupAsset extends AssetBundle
{
    public $sourcePath = '@yiidhtmlx/assets';
    public $css = array(
        'dhtmlxPopup/skins/dhtmlxgrid_dhx_skyblue.css'
    );
    public $js = array(
        'dhtmlxPopup/dhtmlxpopup.js',
    );
    public $depends = array(
        '\yiidhtmlx\WidgetAsset',
    );
}
