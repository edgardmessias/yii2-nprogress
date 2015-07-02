<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace edgardmessias\assets\nprogress;

use yii\web\AssetBundle;

/**
 * @author Edgard Messias <edgardmessias@gmail.com>
 * @since 1.0
 */
class NProgressAsset extends AssetBundle
{
    public $sourcePath = '@bower/nprogress';
    public $css = [
        'nprogress.css',
    ];
    public $js = [
        'nprogress.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    
    /**
     * Registers the CSS and JS files with the given view.
     * @param \yii\web\View $view the view that the asset files are to be registered with.
     */
    public function registerAssetFiles($view)
    {
        $manager = $view->getAssetManager();
        
        if (isset($manager->bundles['yii\widgets\PjaxAsset'])) {
            $jsPjax = <<<PJAX
jQuery(document).on('pjax:start', function() { NProgress.start(); });
jQuery(document).on('pjax:end',   function() { NProgress.done();  });                    
PJAX;
            $view->registerJs($jsPjax, \yii\web\View::POS_END);
            $this->depends[] = 'yii\widgets\PjaxAsset';
        }
        
        parent::registerAssetFiles($view);
    }
}
