<?php
 
 /**
 * This class is merely used to publish assets that are needed by all dhtmlx
 * widgets and thus have to be imported before any widget gets rendered.
 * @copyright Frenzel GmbH - www.frenzel.net
 * @link http://www.frenzel.net
 * @author Philipp Frenzel <philipp@frenzel.net>
 */

namespace yiidhtmlx;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Chart renders an alert bootstrap component.
 *
 * For example,
 *
 * ```php
 * Chart::widget(array(
 *     'closeButton' => array(
 *         'label' => '&times;',
 *     ),
 * ));
 * ```
 *
 * @see http://twitter.github.io/bootstrap/javascript.html#alerts
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @since 2.0
 */
class Chart extends Widget
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
		echo $this->renderChart()."\n";
		echo Html::endTag('div')."\n";
		$this->registerPlugin('chart');
	}

	/**
	* Renders the chart
	*/
	public function renderChart()
	{
		return 'Chart';
	}

	/**
	 * Initializes the widget options.
	 * This method sets the default values for various options.
	 */
	protected function initOptions()
	{
		$this->options = array_merge(array(
			'class' => 'testchart',
		), $this->options);

		$this->addCssClass($this->options, 'alert');
	}
}
