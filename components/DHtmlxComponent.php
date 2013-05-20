<?php
/**
 * This class is merely used to publish assets that are needed by all dhtmlx
 * widgets and thus have to be imported before any widget gets rendered.
 * @copyright Frenzel GmbH - www.frenzel.net
 * 
 * @author Philipp Frenzel <philipp@frenzel.net>
 */

namespace yiiext\dhtmlx;

use Yii;
use yii\base\View;
use yii\web\AssetManager;

class DHtmlxComponent extends \yii\base\Widget
{
	/**
     * All scripts that are common for all widgets.
     * You have to include folder names if the scripts are within the e.g.: "ext" folder
     * Example: "array('ext/somescript.js')"
     *
     * @var array
     */
    protected $scripts = array(
        '../assets/dhtmlxcommon.js',
    );
    /**
     * All css files that should be loaded.
     * You have to include folder names if the css files are within the e.g.: "ext" folder
     * Example: "array('ext/somecss.css')"
     *
     * @var array
     */
    public $css = array();
	/**
	 * The asset path of this component
	 *
	 * @var string
	 */
	protected $assetPath;

	/**
	 * Initializes the component.
	 */
	public function init()
	{
		// Register the dhtmlx path alias.
		if (Yii::getPathOfAlias('@dhtmlx') === false)
		{
			Yii::setPathOfAlias('@dhtmlx', __DIR__.'/..'));
		}

		// Prevents the extension from registering scripts and publishing assets when ran from the command line.
		if (Yii::$app instanceof \yii\console)
			return;

		$this->publishAssets();

		parent::init();
	}

	/**
     * Returns the asset path of this widget and if none exists yet, creates one
     * and returns the path to the newly created folder under /assets
     *
     */
    protected function getAssetPath()
    {
        if(isset($this->assetPath))
        {
            return $this->assetPath;
        }
        //not published yet, so publish the files that are within the "assets" folder to the app's assets folder
        //and return the path
        return $this->assetPath = Yii::$app->assetManager->publish(__DIR__.DIRECTORY_SEPARATOR.'assets');
    }

    /**
     * Published the assets of this component
     */
	protected function publishAssets()
	{
		$this->registerScripts();
		$this->registerCss();
	}

	/**
	 * Publishes the scripts defined in self::$scripts
	 */
	protected function registerScripts()
    {
        $cs = Yii::$app->getClientScript();
        //Include base files
        foreach($this->scripts as $script)
        {
            $cs->registerScriptFile($this->getAssetPath().DIRECTORY_SEPARATOR.$script);
        }
    }

    /**
     * Published the scripts defined in self::$css
     */
    protected function registerCss()
    {
        $cs = Yii::$app->AssetManager();
        //Include base files
        foreach($this->css as $css)
        {
            $cs->registerCssFile($this->getAssetPath().DIRECTORY_SEPARATOR.$css);
        }
    }
}