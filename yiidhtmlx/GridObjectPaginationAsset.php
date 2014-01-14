<?php

namespace yiidhtmlx;

use yii\web\AssetBundle;

/**
 * @link http://www.frenzel.net/
 * @author Philipp Frenzel <philipp@frenzel.net> 
 */

class GridObjectPaginationAsset extends AssetBundle
{
    public $sourcePath = '@yiidhtmlx/assets';
    public $css = array(
        'dhtmlxGrid/ext/dhtmlxgrid_pgn_bricks.css'
    );
    public $js = array(
        //'dhtmlxGrid/ext/dhtmlxgrid_json.js',
        'dhtmlxGrid/ext/dhtmlxgrid_pgn.js'
    );
    public $depends = array(
        '\yiidhtmlx\GridObjectAsset',
    );
}
