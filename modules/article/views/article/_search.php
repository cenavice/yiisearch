<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\article\models\search\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'publishedSearch')->checkbox(['label' => 'Show Published Only']) ?>

    <?= $form->field($model, 'textSearch') ?>

    <div class="form-group">
        <div>
            <label for="">Start Created Date</label>
            <input type="date" name="Article[startCreatedSearch]" value="<?= $model->startCreatedSearch ?>">
        </div>
        <div>
            <label for="">End Created Date</label>
            <input type="date" name="Article[endCreatedSearch]" value="<?= $model->endCreatedSearch ?>">
        </div>
    </div>
    
    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <!-- <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?> -->
    </div>

    <?php ActiveForm::end(); ?>

</div>
