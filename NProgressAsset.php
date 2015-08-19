<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace edgardmessias\assets\nprogress;

use yii\helpers\Json;
use yii\web\AssetBundle;
use yii\web\View;

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
    public $jsOptions = [
        'position' => View::POS_END
    ];
    public $publishOptions = [
        'only'   => [
            '/nprogress.css',
            '/support/extras.css',
            '/nprogress.js',
        ],
    ];
    public $depends = [
    ];

    /**
     * The NProgress Configuration
     * @see https://github.com/rstacruz/nprogress#configuration
     * @var null|array
     */
    public $configuration = null;

    /**
     * Show NProgress during page loading
     * @var boolean
     * @since 0.2.0
     */
    public $page_loading = false;

    /**
     * Show NProgress for pjax:start and pjax:end events
     * @var boolean
     */
    public $pjax_events = true;

    /**
     * Show NProgress for ajaxStart and ajaxComplete events
     * @var boolean
     */
    public $jquery_ajax_events = false;

    /**
     * Registers the CSS and JS files with the given view.
     * @param View $view the view that the asset files are to be registered with.
     */
    public function registerAssetFiles($view)
    {

        if ($this->page_loading) {
            $view->registerJs('NProgress.start();', View::POS_BEGIN);
            $view->registerJs('NProgress.done();', View::POS_LOAD);
            $this->jsOptions['position'] = View::POS_HEAD;
        }

        if ($this->configuration !== null) {
            $view->registerJs('NProgress.configure('
                    . Json::encode($this->configuration)
                    . ');', $this->jsOptions['position']);
        }

        if ($this->pjax_events) {
            $jsPjax = <<<PJAX
jQuery(document).on('pjax:start', function() { NProgress.start(); });
jQuery(document).on('pjax:end',   function() { NProgress.done();  });                    
PJAX;
            $view->registerJs($jsPjax, View::POS_END);
            $this->depends[] = 'yii\widgets\PjaxAsset';
        }

        if ($this->jquery_ajax_events) {
            $jsAjax = <<<AJAX
jQuery(document).on('ajaxStart',    function() { NProgress.start(); });
jQuery(document).on('ajaxComplete', function() { NProgress.done();  });                    
AJAX;
            $view->registerJs($jsAjax, View::POS_END);
            $this->depends[] = 'yii\widgets\JqueryAsset';
        }

        parent::registerAssetFiles($view);
    }
}
