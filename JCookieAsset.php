<?php

namespace futuretek\adminlte\widget;

use yii\web\AssetBundle;

class JCookieAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery-cookie';

    public $js
        = [
            'jquery.cookie.js',
        ];

    public $depends = [
        'yii\web\YiiAsset',
        'dmstr\web\AdminLteAsset',
    ];
}

