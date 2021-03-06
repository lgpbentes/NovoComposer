<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ObjVideo */

$this->title ='Vídeo: ' . $model->assunto;
$this->params['breadcrumbs'][] = ['label' => 'Obj Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-video-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id, 'capitulo_id'=>$capitulo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir esse item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'assunto',

            [
                'attribute'=>'caminho',

                'value'=> !empty($model->caminho) ? '<iframe class="embed-responsive-item" src="'.\Yii::$app->request->BaseUrl.'/'.$model->caminho.'" frameborder="0" allowfullscreen></iframe>' : null,
                'format' => 'raw',
            ],

            'topicos:ntext',
            'exerciciosResolvidos',
            'tipo:ntext',
            'duracao',
            'serie',
            'referencias:ntext',
        ],
    ]) ?>



</div>
