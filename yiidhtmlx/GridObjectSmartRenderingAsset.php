<?php

namespace yiidhtmlx;

use yii\web\AssetBundle;

/**
 * @link http://www.frenzel.net/
 * @author Philipp Frenzel <philipp@frenzel.net> 
 */

class GridObjectSmartRenderingAsset extends AssetBundle
{
    public $sourcePath = '@yiidhtmlx/assets';
    public $css = array(
    );
    public $js = array(
        'dhtmlxGrid/ext/dhtmlxgrid_json.js',        
        'dhtmlxGrid/ext/dhtmlxgrid_srnd.js',
    );
    public $depends = array(
        '\yiidhtmlx\GridObjectAsset',
    );
}
