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
echo Grid::widget(
	array(
		'clientOptions'=>array(
		 	'parent' => 'myTestGrid',
		 	'auto_height' => false,
		 	'skin' => "dhx_web",
		 	'columns' => array(
		 		array('label'=>'Category','size'=>50,'type'=>'ed'),
				array('label'=>'Amount','type'=>'ed'),
		 	),
		 	'image_path' => "./css/imgs/"
		),			
	    'options'=>array(
			'id'    => 'myTestGrid',
			'style' => 'width:100%;height:400px;'
		),
		'clientDataOptions'=>array(
			'type'=>'json',
			'url'=>'data/data.json'))
		),
		'clientEvents'=>array(
			'click'=>'alert("clicked"'),
		)		
	)
);
```
