<?php

namespace futuretek\adminlte\widget;

use yii\web\AssetBundle;

class ExtAdminlteAsset extends AssetBundle
{
    public $sourcePath = '@vendor/futuretek/ext-adminlte-widgets/js';

    public $js
        = [
            'admlteext.js',
        ];

    public $depends = [
        'yii\web\YiiAsset',
        'dmstr\web\AdminLteAsset',
        'futuretek\adminlte\widget\JCookieAsset'
    ];
}

