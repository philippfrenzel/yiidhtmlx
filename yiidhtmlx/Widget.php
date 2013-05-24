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
use yii\base\View;
use yii\helpers\Json;

class Widget extends yii\base\Widget
{
	/**
	 * @var string the dhtmlx theme bundle.
	 */
	//public static $theme = 'yiiext/dhtmlx/theme/dhx_web';
	/**
	 * @var array the HTML attributes for the widget container tag.
	 */
	public $options = array();
	/**
	 * @var array the options for the underlying jQuery UI widget.
	 * Please refer to the corresponding jQuery UI widget Web page for possible options.
	 * For example, [this page](http://api.jqueryui.com/accordion/) shows
	 * how to use the "Accordion" widget and the supported options (e.g. "header").
	 */
	public $clientOptions = array();
	/**
	 * @var array the event handlers for the underlying jQuery UI widget.
	 * Please refer to the corresponding jQuery UI widget Web page for possible events.
	 * For example, [this page](http://api.jqueryui.com/accordion/) shows
	 * how to use the "Accordion" widget and the supported events (e.g. "create").
	 */
	public $clientEvents = array();


	/**
	 * Initializes the widget.
	 * If you override this method, make sure you call the parent implementation first.
	 */
	public function init()
	{
		parent::init();
		if (!isset($this->options['id'])) {
			$this->options['id'] = $this->getId();
		}
	}

	/**
	 * Registers a specific jQuery UI widget and the related events
	 * @param string $name the name of the jQuery UI widget
	 */
	protected function registerWidget($name)
	{
		$id = $this->options['id'];
		$view = $this->getView();
		$view->registerAssetBundle("yiidhtmlx/$name");
		//$view->registerAssetBundle(static::$theme . "/$name");

		if ($this->clientOptions !== false) {
			$options = empty($this->clientOptions) ? '' : Json::encode($this->clientOptions);
			$js = "jQuery('#$id').$name($options);";
			$view->registerJs($js);
		}

		if (!empty($this->clientEvents)) {
			$js = array();
			foreach ($this->clientEvents as $event => $handler) {
				$js[] = "jQuery('#$id').on('$name$event', $handler);";
			}
			$view->registerJs(implode("\n", $js));
		}
	}
}

