<?php
 
 /**
 * This class is merely used to publish assets that are needed by all dhtmlx
 * widgets and thus have to be imported before any widget gets rendered.
 * @copyright Frenzel GmbH - www.frenzel.net
 * @link http://www.frenzel.net
 * @author Philipp Frenzel <philipp@frenzel.net>
 */

namespace yiidhtmlx;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Chart renders an DHTMLX chart component.
 *
 * For example,
 *
 * ```php
 * Chart::widget(array(
 *	   'options'=>array(
 *		   'id'    => 'myTestChart',
 *		   'style' => 'width:280px;height:250px;',
 *	   ),
 *     'clientOptions' => array(
 *         'value' => '#sales#',
 *		   'label' => '#year#'
 *     ),
 *     'clientDataOptions'=> array(
 *         'type' => 'json',
 *		   'url' => 'http://my.json.data'
 *     )
 * ));
 * ```
 *
 * @see http://dhtmlx.com/chart
 * @author Philipp Frenzel <philipp@frenzel.net>
 * @since 1.0
 */

class Grid extends Widget
{
	/**
	* @var object name of the dhtmlxmenuobject, default empty
	*/
	public $enableContextMenu = '';

	/**
	 * [$enablePaging description]
	 * @var boolean default false
	 */
	public $enablePaging = false;

	/**
	 * [$setGroupBy description]
	 * @var INTEGER that represents the column to group by
	 */
	public $setGroupBy = NULL;
	
	/**
	 * [$enableSmartRendering description]
	 * @var boolean default true
	 */
	public $enableSmartRendering = true;

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		parent::init();
		$this->initOptions();
	}

	/**
	 * Renders the widget.
	 */
	public function run()
	{
		echo Html::beginTag('div', ['id'=>'recinfoArea'.$this->options['id']]) . "\n";
		echo Html::endTag('div')."\n";
		echo Html::beginTag('div', $this->options) . "\n";
		echo Html::endTag('div')."\n";
		echo Html::beginTag('div', ['id'=>'pagingArea'.$this->options['id']]) . "\n";
		echo Html::endTag('div')."\n";		
		
		$this->registerPlugin('gridObject');
	}

	/**
	 * Initializes the widget options.
	 * This method sets the default values for various options.
	 */
	protected function initOptions()
	{
		$this->options = array_merge(array(
			'class' => 'dhtmlxGrid',
		), $this->options);
	}
}
