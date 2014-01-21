yiidhtmlx
=========

yiidhtmlx components and extensions

1) First widget will be the dhtmlx chart
2) Second widget will be the dhtmlx grid

installation
============

Add the sources to your composer.json > repositories file:
```json
{
    "type": "package",
    "package": {
        "name": "philippfrenzel/yiidhtmlx",
        "version": "0.1.10",
        "authors": [
            {
                "name": "Philipp Frenzel",
                "homepage": "http://frenzel.net"
            }
        ],
        "source": {
            "url": "https://github.com/philippfrenzel/yiidhtmlx.git",
            "type": "git",
            "reference": "master"
        },
        "autoload": {
            "psr-0": { "yiidhtmlx\\": "/" }
        }
    }
}
```

Package is although registered at packagist.org - so you can just add one line of code, to let it run!

```json
"require": {
        "philippfrenzel/yiidhtmlx":"*"
},
```

MetroUI already loaded?
- As I use assetparser extension to parse the less files into my distribution, i commented the assets.php to avoid static css loading. If you need the css-files to be loaded statically, pls. uncomment the entries!

Chart
=====

For a full list of possibilities, pls although check out the website www.dhtmlx.com

Chart renders an DHTMLX chart component.

For example,

```php

use yiidhtmlx\Chart;

Chart::widget(array(
	   'options'=>array(
		   'id'    => 'myTestChart',
		   'style' => 'width:280px;height:250px;',
	   ),
    'clientOptions' => array(
        'value' => '#sales#',
		   'label' => '#year#'
    ),
    'clientDataOptions'=>array(
		'type'=>'json',
		'url'=>'data/data.json'))
	),
	'clientEvents'=>array(
		'click'=>'alert("clicked"'),
	)
));
```

Grid
====

For a full list of possibilities, pls although check out the website www.dhtmlx.com

Chart renders an DHTMLX chart component.

For example,
```php

use yiidhtmlx\Grid;

//needs to be registered manualy as the base url is only available later
$this->registerAssetBundle('yiidhtmlx/WidgetAsset');

$imgPath = Yii::$app->assetManager->getBundle('yiidhtmlx/WidgetAsset')->baseUrl . "/dhtmlxGrid/imgs/";

echo Grid::widget(
	array(
		'clientOptions'=>array(
		 	'parent' => 'myTestGrid',
		 	'auto_height' => true,
		 	'auto_width' => true,
		 	'skin' => "dhx_terrace",
		 	'columns' => array(
		 		array('label'=>'id','width'=>'40','type'=>'ro'),
				array('label'=>array(Yii::t('app','Address'),'#text_filter'),'type'=>'ed'),
				array('label'=>array(Yii::t('app','Name'),'#text_filter'),'type'=>'ed'),
				array('label'=>array(Yii::t('app','N/O'),'#select_filter'),'width'=>'50','type'=>'ch'),
				array('label'=>Yii::t('app','Cap.'),'width'=>'100','type'=>'ed'),
			),
		 	'image_path' => $imgPath
		),
    'enableSmartRendering' => false, 
    'options'=>array(
			'id'    => 'myTestGrid',
		),
		'clientDataOptions'=>array(
			'type'=>'json',
			'url'=>Html::url(array('/location/jsongridlocationdata'))
		),
		'clientEvents'=>array(
			'onRowSelect'=>'doOnRowSelect',
		)		
	)
);
```

As we are using smart rendering, the full functionality in the controller referenced by url should look as followed:
```
   /**
   * returns the json for the dhtmlx grid
   * @param  date  $un       YYYYMMDD
   * @param  integer $posStart current position in grid scroll
   * @param  integer $count    last record handed over
   * @return JSON               json object, see dhtmlx for more information
   */
  public function actionDhtmlxgrid($un=NULL, $posStart=0, $count=0){
    $currentPage = 0;
    $pageSize = 50;
    
    if($posStart>0){
      $currentPage = round(($posStart / $pageSize),0);
    }

    $query = new Query;
    $provider = new ArrayDataProvider([
      'allModels' => $query->select('id,organisationName,taxNumber,registrationCountryCode')->from('tbl_party')->all(),
      'sort' => [
        'attributes' => ['id', 'organisationName', 'taxNumber'],
      ],
      'pagination' => [
        'pageSize' => $pageSize,
        'page' => $currentPage
      ],
    ]);

    //the grid header to pass over total count
    $clean = ['total_count'=>Party::find()->count(),'pos'=>$posStart];
    foreach($provider->getModels() AS $record){
      if(!is_null($record))
      {
        $clean['rows'][]=['id'=>$record['id'],'data'=>array_values($record)];
      }
    }

    header('Content-type: application/json');
    echo Json::encode($clean);
    exit();
  }
```

If you wanna script using the id of the object, the name will be "dhtmlxID" -> dhtmlxmyTestGrid.

* The clientOptions->parent must be the same as the options->id !
* The skin is currently default to dhx_terrace.
* For a complete list of clientOptions check out the dhtmlx.com webpage
* While you set auto_height to false, you need to add in options->style:"height:400px"

Tree and Contextmenu
====================

The following sample let's you attach an right mouse menu to the tree

```php

$imgPath = Yii::$app->assetManager->getBundle('yiidhtmlx/WidgetAsset')->baseUrl . "/dhtmlxTree/imgs/csh_dhx_terrace/";
$imgMenuPath = Yii::$app->assetManager->getBundle('yiidhtmlx/WidgetAsset')->baseUrl . "/dhtmlxMenu/imgs/dhxmenu_dhx_terrace/";

echo Menu::widget(
	array(
		'clientOptions'=>array(
		 	'parent' => 'myCMSTreeMenu',
		 	'skin' => "dhx_terrace",
		 	'context' => true,
		 	'image_path' => $imgMenuPath,
		 	'items' => array(
		 		array('id'=>'createchild','text'=>'Create new Child','img'=>'img/dhtmlx/s4.gif'),
		 		array('id'=>'gotoparent','text'=>'Go to Parent','img'=>'img/dhtmlx/s3.gif')
		 	)
		),			
	    'options'=>array(
			'id'    => 'myCMSTreeMenu',
		),
		'clientEvents'=>array(
			'onClick' => 'doOnMenuSelect',
		)		
	)
);

echo Tree::widget(
	array(
		'enableContextMenu'=>'dhtmlxmyCMSTreeMenu',
		'clientOptions'=>array(
		 	'parent' => 'myCMSTree',
		 	'skin' => "terrace",
		 	'image_path' => $imgPath,
		 	'width' => '100%',
		 	'height' => '200px',
		 	'checkbox' => false,
		 	'smart_parsing' => true,
		),			
	    'options'=>array(
			'id'    => 'myCMSTree',
		),
		'clientDataOptions'=>array(
			'type'=>'json',
			'url'=>Html::url(array('/pages/jsontreeview','rootId'=>$rootId))
		),
		'clientEvents'=>array(
			'onClick' => 'doOnRowSelect',
		)		
	)
);

$jumpTarget = Html::url(array('/pages/view','id'=>''));
$jumpJS = <<<DEL

function doOnRowSelect(id,ind) {
	window.location = "$jumpTarget"+id;	
};

function doOnMenuSelect(id,type) {
	var Nodeid = dhtmlxmyCMSTree.contextID;
	alert(id);	
	alert(Nodeid);
};
DEL;
$this->registerJs($jumpJS); //where $this is the current view!

```

Tabbar Object
=============
```
use yiidhtmlx\Tabbar;

echo Tabbar::widget(
  [
  'clientOptions'=>[
      'parent'      => 'PurchaseOrderTabbar',
      'image_path'  => Yii::$app->AssetManager->getBundle('yiidhtmlx\TabbarObjectAsset')->baseUrl."/dhtmlxTabbar/imgs/dhx_terrace/",
      'skin'        => "dhx_terrace",       
      'tabs' => [
        ['id'=> 'tab_one','label'=>'id','width'=>'100%']
      ],
    ],
    'tabs'=>[
      ['tab_one'=>'tabrequested']
    ]   
  ]
);
```