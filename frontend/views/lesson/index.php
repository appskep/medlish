<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Lessons';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-lessons">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach ($lessons as $lesson) { ?>
    <div class="detail-view-container panel-body" style="box-shadow:0 0 1px rgba(0,0,0,0.5); border-radius:4px; background:#fafafa; margin-bottom:10px">
        <?= Html::a($lesson['name'], ['/lesson/view', 'id' => $lesson['id']]) ?>
    </div>
    <?php } ?>

</div>
