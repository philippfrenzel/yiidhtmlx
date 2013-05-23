<?php

return array(
	'yiiext/dhtmlx' => array(
		'sourcePath' => __DIR__ . '/assets',
		'js' => array(
			'js/dhtmlxcommon.js',
			'js/dhtmlxcontainer.js',
		),
	),
	'yii/dhtmlx/chart' => array(
		'sourcePath' => __DIR__ . '/assets',
		'js' => array(
			'js/dhtmlxchart.js',
		),
		'css'=>array(
			'css/dhtmlxchart.css',
		),
		'depends' => array('yiiext/dhtmlx'),
	),
	'yii/dhtmlx/alert' => array(
		'sourcePath' => __DIR__ . '/assets',
		'js' => array(
			'js/dhtmlxmessage.js',
		),
		'css'=>array(
			'css/dhtmlxmessage_dhx_web.css'
		),
		'depends' => array('yiiext/dhtmlx'),
	),
	'yii/dhtmlx/accordion' => array(
		'sourcePath' => __DIR__ . '/assets',
		'js' => array(
			'js/dhtmlxaccordion.js',
		),
		'css'=>array(
			'css/dhtmlxaccordion_dhx_web.css',
		),
		'depends' => array('yiiext/dhtmlx'),
	),
);
