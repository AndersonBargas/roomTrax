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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendors/bootstrap/dist/css/bootstrap.min.css', // Bootstrap
        'vendors/font-awesome/css/font-awesome.min.css', // Font Awesome
        'vendors/nprogress/nprogress.css', // NProgress
        'vendors/iCheck/skins/flat/green.css', // iCheck
        'vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css', // bootstrap-progressbar
        'vendors/jqvmap/dist/jqvmap.min.css', // JQVMap
        'vendors/bootstrap-daterangepicker/daterangepicker.css', // bootstrap-daterangepicker
        'css/custom.min.css', // Custom Theme Style
    ];
    public $js = [
        'vendors/jquery/dist/jquery.min.js', // jQuery
        'vendors/bootstrap/dist/js/bootstrap.min.js', // Bootstrap
        'vendors/fastclick/lib/fastclick.js', // FastClick
        'vendors/nprogress/nprogress.js', // NProgress
        'vendors/Chart.js/dist/Chart.min.js', // Chart.js
        'vendors/gauge.js/dist/gauge.min.js', // gauge.js
        'vendors/bootstrap-progressbar/bootstrap-progressbar.min.js', // bootstrap-progressbar
        'vendors/iCheck/icheck.min.js', // iCheck
        'vendors/skycons/skycons.js', // Skycons
        'vendors/Flot/jquery.flot.js', // Flot
        'vendors/Flot/jquery.flot.pie.js', // Flot
        'vendors/Flot/jquery.flot.time.js', // Flot
        'vendors/Flot/jquery.flot.stack.js', // Flot
        'vendors/Flot/jquery.flot.resize.js', // Flot
        'vendors/flot.orderbars/js/jquery.flot.orderBars.js', // Flot plugins
        'vendors/flot-spline/js/jquery.flot.spline.min.js', // Flot plugins
        'vendors/flot.curvedlines/curvedLines.js', // Flot plugins
        'vendors/DateJS/build/date.js', // DateJS
        'vendors/jqvmap/dist/jquery.vmap.js', // JQVMap
        'vendors/jqvmap/dist/maps/jquery.vmap.world.js', // JQVMap
        'vendors/jqvmap/examples/js/jquery.vmap.sampledata.js', // JQVMap
        'vendors/moment/min/moment.min.js', // bootstrap-daterangepicker
        'vendors/bootstrap-daterangepicker/daterangepicker.js', // bootstrap-daterangepicker
        'js/custom.min.js', // Custom Theme Scripts

    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}