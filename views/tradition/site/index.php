<?php

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $adList array */
$this->title = '首页';
use app\widgets\LastNews;
use app\widgets\ConfigPanel;
use yii\widgets\ListView;
use yii\bootstrap\Carousel;
use yii\helpers\Url;
use app\helpers\StringHelper;

$carouselItems = [];
?>
<style>
    .image-box a{
        height: 240px;width:240px; text-align: center;vertical-align: middle;display: table-cell;
    }
    .image{max-width:100%;max-height:200px;vertical-align:middle;display: inline}
</style>
<div class="site-index panel">
    <div class="projects-header page-header">
        <h2>产品展示 <small>The latest product</small></h2>

    </div>
    <div class="panel-body">
        <div class="row">
            <?php if (!empty($products)):foreach ($products as $model): ?>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="image-box">
                            <a href="<?= Url::to(['/products/', 'id' => $model->id]) ?>">
                                <img alt="<?= $model->title ?>" src="<?= $model->image ?>" class="image">
                            </a>
                        </div>
                        <div class="caption">
                            <h5>
                                <a href="<?= Url::to(['/products/', 'id' => $model->id]) ?>"
                                   title="<?= $model->title ?>">
                                    <?= StringHelper::truncateUtf8String($model->title, 13, false) ?>
                                </a>
                            </h5>
                            <div style="height: 40px;overflow: hidden;">
                                <?= $model->description ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;endif; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-7">
        <div class="panel">
            <div class="projects-header page-header">
                <h2>企业咨询
                    <small>The latest news</small>
                </h2>
            </div>
            <?= \app\widgets\LastNews::widget([
                'showDate' => true,
                'showHeader' => false,
                'limit'=>6,
                'options' => ['class' => 'panel-body'],
                'itemOptions' => ['class' => 'list-group-item-simple']
            ]) ?>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel">
            <div class="projects-header page-header">
                <h2>联系我们
                    <small>connect us</small>
                </h2>
            </div>
            <?=\app\widgets\ConfigPanel::widget([
                'configName'=>'contact_us',
                'showHeader'=>false,
                'options' => ['class' => 'panel-body'],
            ])?>
        </div>
    </div>
</div>