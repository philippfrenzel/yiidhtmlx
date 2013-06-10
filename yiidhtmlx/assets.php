<?php

return array(
	'yiidhtmlx/core' => array(
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
		'depends' => array('yiidhtmlx/core'),
	),
	'yiidhtmlx/grid' => array(
		'sourcePath' => __DIR__ . '/assets',
		'js' => array(
			'js/dhtmlxgrid.js',
			'js/dhtmlxgridcell.js',
		),
		'css'=>array(
			'css/dhtmlxgrid.css',
			'css/skins/dhtmlxgrid_dhx_web.css'
		),
		'depends' => array('yiidhtmlx/core'),
	),
	'yiidhtmlx/alert' => array(
		'sourcePath' => __DIR__ . '/assets',
		'js' => array(
			'js/dhtmlxmessage.js',
		),
		'css'=>array(
			'css/dhtmlxmessage_dhx_web.css'
		),
		'depends' => array('yiidhtmlx'),
	),
	'yiidhtmlx/accordion' => array(
		'sourcePath' => __DIR__ . '/assets',
		'js' => array(
			'js/dhtmlxaccordion.js',
		),
		'css'=>array(
			'css/dhtmlxaccordion_dhx_web.css'
		),
		'depends' => array('yiidhtmlx/core'),
	)
);
