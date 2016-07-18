<?php

namespace futuretek\adminlte\widget;

use yii\bootstrap\Widget;
use yii\helpers\Html;

/**
 * This is just an example.
 */
class Alert extends Widget
{
    const TYPE_SUCCESS = 'success';
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';
    const TYPE_INFO = 'info';

    /**@var string $type color style of widget* */

    public $type = self::TYPE_SUCCESS;

    /**@var boolean $closable show or not close button* */
    public $closable = true;

    /**@var string $header Alert header* */
    public $header = '';

    /**@var string $text your message* */
    public $text = '';

    /**@var string $icon icon class such as "ion ion-bag  or fa fa-beer"* */
    public $icon = '';

    public function init()
    {
        parent::init();
        if (!$this->icon) {
            switch ($this->type) {
                case self::TYPE_INFO: {
                    $this->icon = 'fa fa-info';
                    break;
                }
                case self::TYPE_DANGER: {
                    $this->icon = 'fa fa-ban';
                    break;
                }
                case self::TYPE_WARNING: {
                    $this->icon = 'fa fa-warning';
                    break;
                }
                case self::TYPE_SUCCESS: {
                    $this->icon = 'fa fa-check';
                    break;
                }
                default: {
                    $this->icon = 'fa fa-question';
                }
            }
        }
    }

    public function run()
    {
        Html::addCssClass($this->options, 'alert');
        Html::addCssClass($this->options, 'alert-' . $this->type);
        if ($this->closable) {
            Html::addCssClass($this->options, 'alert-dismissable');
        }

        $icon = $this->icon ? '<i class="' . $this->icon . '"></i>' : '';
        $header = $this->header ? '<h4>' . $icon . ' ' . $this->header . '</h4>' : $icon;
        $closable = $this->closable ? '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' : '';

        echo Html::tag('div', $closable . $header . $this->text, $this->options);
    }

}
