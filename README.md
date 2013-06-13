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
        "yiisoft/yii2": "dev-master",
        "yiisoft/yii2-composer":"dev-master",
        "philippfrenzel/yiidhtmlx":"*"
},
```

MetroUI already loaded?
- As I use assetparser extension to parse the less files into my distribution, i commented the assets.php to avoid static css loading. If you need the css-files to be loaded statically, pls. uncomment the entries!

Add the following line to your index.php in /www

```php
Yii::setAlias('@yiidhtmlx', __DIR__ . '/../vendor/philippfrenzel/yiidhtmlx/yiidhtmlx/');
```

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
		 	//'image_path' => "./assets/".'x'."/css/imgs/"
		),			
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

The clientOptions->parent must be the same as the options->id !
The skin is currently default to dhx_terrace.
For a complete list of clientOptions check out the dhtmlx.com webpage