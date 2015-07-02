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
}
