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
 * Tree::widget(array(
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
 * @link http://docs.dhtmlx.com/doku.php?id=dhtmlxtree:api_constructor_object List of supported options
 * 
 * @see http://dhtmlx.com/chart
 * @author Philipp Frenzel <philipp@frenzel.net>
 * @since 1.0
 */

class Tree extends Widget
{
	
	/**
	* @var boolean autoloading default true
	*/
	public $AutoLoading = true;

	/**
	* @var object name of the dhtmlxmenuobject, default empty
	*/
	public $enableContextMenu = '';

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
		$this->registerPlugin('treeObject');
	}

	/**
	 * Initializes the widget options.
	 * This method sets the default values for various options.
	 */
	protected function initOptions()
	{
		$this->options = array_merge(array(
			'class' => 'dhtmlxTree',
		), $this->options);
	}
}
