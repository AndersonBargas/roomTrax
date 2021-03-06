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
        'vendors/fullcalendar/dist/fullcalendar.min.css', // FullCalendar
        'vendors/fullcalendar/dist/fullcalendar.print.css', // FullCalendar-
        'vendors/iCheck/skins/flat/green.css', // iCheck
        'vendors/switchery/dist/switchery.min.css', // Switchery
        'vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css', // bootstrap-progressbar
        'vendors/jqvmap/dist/jqvmap.min.css', // JQVMap
        'vendors/bootstrap-daterangepicker/daterangepicker.css', // bootstrap-daterangepicker
        'vendors/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css', // DateTimePicker
        'css/custom.css', // Custom Theme Style
    ];
    public $js = [
        //'vendors/jquery/dist/jquery.min.js', // jQuery
        'vendors/bootstrap/dist/js/bootstrap.min.js', // Bootstrap
        'vendors/fastclick/lib/fastclick.js', // FastClick
        'vendors/moment/min/moment.min.js', // Moment
        'vendors/moment/locale/pt-br.js', // Moment
        'vendors/fullcalendar/dist/fullcalendar.min.js', // FullCalendar
        'vendors/nprogress/nprogress.js', // NProgress
        'vendors/bootbox/bootbox.min.js', // BootBox
        'vendors/Chart.js/dist/Chart.min.js', // Chart.js
        'vendors/gauge.js/dist/gauge.min.js', // gauge.js
        'vendors/bootstrap-progressbar/bootstrap-progressbar.min.js', // bootstrap-progressbar
        'vendors/iCheck/icheck.min.js', // iCheck
        'vendors/switchery/dist/switchery.min.js', // Switchery
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
        'vendors/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', // DateTimePicker
        'js/custom.js', // Custom Theme Scripts

    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}