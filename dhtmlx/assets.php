<?php

return array(
	'yiiext/yiidhtmlx' => array(
		'sourcePath' => __DIR__ . '/assets',
		'js' => array(
			'js/dhtmlxcommon.js',
		),
	),
	'yiiext/yiidhtmlx/chart' => array(
		'sourcePath' => __DIR__ . '/assets',
		'js' => array(
			'js/dhtmlxchart.js',
		),
		'css'=>array(
			'css/dhtmlxchart.css'
		),
		'depends' => array('yiiext/dhtmlx'),
	),
	'yiiext/yiidhtmlx/alert' => array(
		'sourcePath' => __DIR__ . '/assets',
		'js' => array(
			'js/dhtmlxmessage.js',
		),
		'css'=>array(
			'css/dhtmlxmessage_dhx_web.css'
		),
		'depends' => array('yiiext/dhtmlx'),
	),
);
