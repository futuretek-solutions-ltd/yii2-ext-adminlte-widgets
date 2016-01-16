Widgets for AdminLte theme
===========================

Usage
------

* Box

```php
    <?= futuretek\adminlte\widget\Box::begin([
             'type'=>futuretek\adminlte\widget\Box::TYPE_PRIMARY,
             'solid'=>true,
             'left_tools'=>'<button class="btn btn-success btn-xs create_button" ><i class="fa fa-plus-circle"></i> Something</button>',
             'tooltip'=>'Tooltip',
             'title'=>'Title',
             'footer'=>'Footer',
             'collapse'=>true
         ])?>
        ANY BOX CONTENT HERE
    <?= futuretek\adminlte\widget\Box::end()?>
```

* Tile

```php
   <?= futuretek\adminlte\widget\Tile::begin([
               'type'=>futuretek\adminlte\widget\Tile::TYPE_RED,
               'tooltip'=>'Useful information!',
               'title'=>'Attention!',
               'collapse'=>false
           ])?>
        ANY BOX CONTENT HERE
         ANY BOX CONTENT HERE
          ANY BOX CONTENT HERE
           ANY BOX CONTENT HERE
   <?= futuretek\adminlte\widget\Tile::end()?>
```

* SmallBox

```php
   <?= futuretek\adminlte\widget\SmallBox::widget([
        'type'=>futuretek\adminlte\widget\SmallBox::TYPE_PURPLE,
        'head'=>'90%',
        'text'=>'Free Space',
        'icon'=>'fa fa-cloud-download',
        'footer'=>'Подробнее <i class="fa fa-hand-o-right"></i>',
        'footer_link'=>'#'
    ]);?>
```

* InfoBox

```php
    <?= futuretek\adminlte\widget\InfoBox::widget([
       'boxBg'=>futuretek\adminlte\widget\InfoBox::TYPE_AQUA,
       'iconBg'=>futuretek\adminlte\widget\InfoBox::TYPE_GREEN,
       'number'=>100500,
       'text'=>'Test Three',
       'icon'=>'fa fa-bolt',
       'progress'=>66,
       'progressText'=>'Something about this'
    ])?>
```

* Callout

```php
   <?= futuretek\adminlte\widget\Callout::widget([
        'type'=>futuretek\adminlte\widget\Alert::TYPE_WARNING,
        'head'=>'Operation Complete',
        'text'=>'Something text bla-bla-bla bla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-bla'
    ]);?>
```

* Alert

```php
    <?= futuretek\adminlte\widget\Alert::widget([
        'type'=>futuretek\adminlte\widget\Alert::TYPE_SUCCESS,
        'text'=>'Operation Complete',
        'closable'=>true
    ]);?>
```

Add in layout

```php
    <?= futuretek\adminlte\widget\FlashAlerts::widget([
        'errorIcon'=>'<i class="fa fa-warning"></i>',
        'successIcon'=>'<i class="fa fa-check"></i>',
        'successTitle'=>'Done!',
        'closable'=>true,
        'encode'=>false,
        'bold'=>false
    ]);?>
```

And set flash messages anywhere

```php
Yii::$app->session->setFlash('info1','Message1');
Yii::$app->session->setFlash('info2','Message2');
Yii::$app->session->setFlash('info3','Message3');
Yii::$app->session->setFlash('success-first','Message');
Yii::$app->session->setFlash('success-second','Message');
```

* Timeline
 
```php
<?= futuretek\adminlte\widget\Timeline::widget(
     [
         'defaultDateBg' => futuretek\adminlte\widget\Timeline::TYPE_PURPLE, //default background for date label
         'items' => [
                '1381767094'=>[
                     Yii::createObject(
                                  [
                                      'class' => futuretek\adminlte\widget\TimelineItem::className(),
                                      'time' => 1381767094,
                                      'header' =>'SOME HEADER',
                                      'body' => 'Well, i`m informative body'
                                      'iconClass'=>'fa fa-beer',
                                      'iconBg'=>'orange'
                                  ]
                              ),
                      Yii::createObject(
                                   [
                                       'class' => futuretek\adminlte\widget\TimelineItem::className(),
                                       'time' => 1381767098,
                                       'header' =>'SOME HEADER',
                                       'iconClass'=>'fa fa-beer',
                                       'iconBg'=>'green'
                                   ]
                                       )

                ],
                '1400880100'=>[
                      Yii::createObject(
                                 [
                                     'class' => futuretek\adminlte\widget\TimelineItem::className(),
                                     'time' => 1400880100,
                                     'body' => 'Well, i`m informative body'
                                     'iconClass'=>'fa fa-cloud',
                                     'iconBg'=>futuretek\adminlte\widget\Timeline::TYPE_BLUE'
                                 ]
                             ),
                              ],
                '1353182717'=>[....],
                '1331361126'=>[....],
         ],
         'dataFunc' => function ($data) { return date('d.m, Y', $data); }
     ]
 ) ?>
```

Example TimeLine Generator

```php
<?php
$timeline_items=[];
for ($i = 0; $i < 5; $i++) {
 $time = (time() - mt_rand(3600, 3600 * 24 * 7 * 30 * 5));
 $objcnt = mt_rand(1, 6);
 $events = [];
 for ($j = 0; $j < $objcnt; $j++) {
     $isFoot = mt_rand(0, 1);
     $footer='something in foot '.$i.'_'.$j;
     $obj = Yii::createObject(
         [
             'class' => futuretek\adminlte\widget\ExampleTimelineItem::className(),  //Example of customization TimelineItem Object
             'time' => $time - mt_rand(0, 3600 * 11),
             'header' =>'HEADER NUMBER '.$i.'_'.$j,
             'body' => 'Well, i`m informative body '.$i.'_'.$j,
             'type' => mt_rand(0, 1),
             'footer' => $isFoot?$footer:''
         ]
     );
     $events[] = $obj;
 }
 $timeline_items[$time] = $events;
}


//Next we can show its in our widget

echo futuretek\adminlte\widget\Timeline::widget(
          [
              'defaultDateBg' => function ($data) {
                  $d = date('j', $data);
                  if ($d <= 10) {
                      return futuretek\adminlte\widget\Timeline::TYPE_FUS;
                  } elseif ($d <= 20) {
                      return futuretek\adminlte\widget\Timeline::TYPE_MAR;
                  } else {
                      return futuretek\adminlte\widget\Timeline::TYPE_PURPLE;
                  }
              },
              'items' => $timeline_items,
              'dateFunc' => function ($data) { return date('d.m, Y', $data); }
          ]
      )

```

