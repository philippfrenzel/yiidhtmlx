<?php

namespace yiidhtmlx;

use yii\web\AssetBundle;

/**
 * @link http://www.frenzel.net/
 * @author Philipp Frenzel <philipp@frenzel.net> 
 */

class MenuObjectAsset extends AssetBundle
{
    public $sourcePath = '@yiidhtmlx/assets';
    public $css = array(
        'dhtmlxMenu/skins/dhtmlxmenu_dhx_terrace.css'
    );
    public $js = array(
        'dhtmlxMenu/dhtmlxmenu.js',
        'dhtmlxMenu/ext/dhtmlxmenu_ext.js',
    );
    public $depends = array(
        '\yiidhtmlx\WidgetAsset',
    );
}
