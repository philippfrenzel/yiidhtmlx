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
 * Tabbar::widget(array(
 *	   'options'=>array(
 *		   'id'    => 'myTestChart',
 *		   'style' => 'width:280px;height:250px;',
 *	   )
 * ));
 * ```
 *
 * @see http://dhtmlx.com/chart
 * @author Philipp Frenzel <philipp@frenzel.net>
 * @since 1.0
 */

class Tabbar extends Widget
{

	/**
	 * Client Options, see dhtmlx tabbar docs for parameters
	 * @var [type]
	 */
	public $clientOptions=array();

	/**
	 * Array of page tab id's and html id's that will be put inside the tabbs
	 * @var [type]
	 */
	public $tabs = array();

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
		//echo $this->renderChart()."\n";
		echo Html::endTag('div')."\n";
		$this->registerPlugin('tabbarObject');
	}

	/**
	 * Initializes the widget options.
	 * This method sets the default values for various options.
	 */
	protected function initOptions()
	{
		$this->options = array_merge(array(
			'class' => 'dhtmlxTabbar',
		), $this->options);
	}
}
