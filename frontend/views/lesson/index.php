<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Lessons';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-lessons">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="detail-view-container panel-body" style="box-shadow:0 0 1px rgba(0,0,0,0.5); border-radius:4px; background:#fafafa; margin-bottom:10px">
        <a href="<?= Url::to(['/lesson/view', 'id' => '1']) ?>">1. Introducing Yourself and Hospital Staff
    </div>

    <div class="detail-view-container panel-body" style="box-shadow:0 0 1px rgba(0,0,0,0.5); border-radius:4px; background:#fafafa; margin-bottom:10px">
        <a href="<?= Url::to(['/lesson/view', 'id' => '2']) ?>">2. Working Shift, Times, Number, and Daily Activities
    </div>

    <div class="detail-view-container panel-body" style="box-shadow:0 0 1px rgba(0,0,0,0.5); border-radius:4px; background:#fafafa; margin-bottom:10px">
        <a href="<?= Url::to(['/lesson/view', 'id' => '3']) ?>">3. The Anatomical Positions and Body Parts
    </div>

</div>
