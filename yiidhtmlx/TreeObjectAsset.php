<?php

namespace yiidhtmlx;

use yii\web\AssetBundle;

/**
 * @link http://www.frenzel.net/
 * @author Philipp Frenzel <philipp@frenzel.net> 
 */

class TreeObjectAsset extends AssetBundle
{
    public $sourcePath = '@yiidhtmlx/assets';
    public $css = array(
        '/dhtmlxTree/dhtmlxtree.css'
    );
    public $js = array(
        '/dhtmlxTree/dhtmlxtree.js',
        '/dhtmlxTree/ext/dhtmlxtree_json.js',
        '/dhtmlxTree/ext/dhtmlxtree_dragin.js',
        '/dhtmlxTree/ext/dhtmlxtree_xw.js',
    );
    public $depends = array(
        '\yiidhtmlx\WidgetAsset',
    );
}
