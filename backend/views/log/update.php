<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Log */

$this->title = 'Update Log: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="log-update box box-warning">

    <div class="box-header"></div>

    <div class="box-body">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
    </div>

</div>
