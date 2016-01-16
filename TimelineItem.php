<?php

namespace futuretek\adminlte\widget;


use yii\base\Object;

/**You can extend this object with any other property, getters and setters**/
class TimelineItem extends Object
{
    public $time = '';
    public $header = '';
    public $body = '';
    public $footer = '';
    public $iconClass = '';
    public $iconBg = '';

}