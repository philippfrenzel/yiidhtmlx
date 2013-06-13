yiidhtmlx
=========

yiidhtmlx components and extensions

1) First widget will be the dhtmlx chart



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