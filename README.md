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
<?= \edgardmessias\assets\nprogress\NProgressAsset::register($this); ?>```