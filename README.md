Yii2 NProgress
==============
Slim progress bars for Ajax'y applications. Inspired by Google, YouTube, and Medium for Yii2 Framework.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist edgardmessias/yii2-nprogress "*"
```

or add

```
"edgardmessias/yii2-nprogress": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your view code by  :

```php
<?php \edgardmessias\assets\nprogress\NProgressAsset::register($this); ?>
```

Customization
-------------

To change settings, simply add the following code in your configuration

```php
'components' => [
    'assetManager' => [
        'bundles' => [
            'edgardmessias\assets\nprogress\NProgressAsset' => [
                'configuration' => [
                    'minimum' => 0.08,
                    'showSpinner' => true,
                ],
                'pjax_events' => true,
                'jquery_ajax_events' => false,
            ],
        ],
    ],
],
```

### Settings
 * `configuration`: The [NProgress Configuration]( https://github.com/rstacruz/nprogress#configuration) (Default: `null`)
 * `pjax_events`: Show NProgress for pjax:start and pjax:end events (Default: `true`)
 * `jquery_ajax_events`: Show NProgress for ajaxStart and ajaxComplete events (Default: `false`)