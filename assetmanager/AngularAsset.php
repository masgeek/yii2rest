<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 3/27/2017
 * Time: 3:10 PM
 */

namespace app\assetmanager;


use yii\web\AssetBundle;
use yii\web\View;

class AngularAsset extends AssetBundle
{
    public $sourcePath = '@bower';
    public $js = [
        'angular/angular.js',
        'angular-route/angular-route.js',
        'angular-strap/dist/angular-strap.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}