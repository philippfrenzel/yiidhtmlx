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
 * Menu::widget(array(
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

class Menu extends Widget
{
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
		echo Html::beginTag('div', $this->options) . "\n";
		echo Html::endTag('div')."\n";
		$this->registerPlugin('MenuObject');
	}

	/**
	 * Initializes the widget options.
	 * This method sets the default values for various options.
	 */
	protected function initOptions()
	{
		$this->options = array_merge(array(
			'class' => 'dhtmlxMenu',
		), $this->options);
	}
}
