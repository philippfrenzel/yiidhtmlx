<?php

return array(
	'yiidhtmlx/dhtmlx' => array(
		'sourcePath' => __DIR__ . '/assets',
		'js' => array(
			'js/dhtmlxcommon.js',
		),
	),
	'yiidhtmlx/chart' => array(
		'sourcePath' => __DIR__ . '/assets',
		'js' => array(
			'js/dhtmlxchart.js',
		),
		'css'=>array(
			'css/dhtmlxchart.css'
		),
		'depends' => array('yiidhtmlx/dhtmlx'),
	),
	'yiidhtmlx/alert' => array(
		'sourcePath' => __DIR__ . '/assets',
		'js' => array(
			'js/dhtmlxmessage.js',
		),
		'css'=>array(
			'css/dhtmlxmessage_dhx_web.css'
		),
		'depends' => array('yiidhtmlx/dhtmlx'),
	),
);
