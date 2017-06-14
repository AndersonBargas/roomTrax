<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendors/bootstrap/dist/css/bootstrap.min.css',     // Bootstrap
        'vendors/font-awesome/css/font-awesome.min.css',    // Font Awesome
        'vendors/nprogress/nprogress.css',                  // NProgress
        'vendors/animate.css/animate.min.css',              // Animate.css
        'css/custom.min.css',                               // Custom Theme Style
    ];
    public $js = [
    ];
    public $depends = [];
}