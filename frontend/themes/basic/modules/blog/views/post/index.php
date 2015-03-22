<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use app\modules\user\models\User;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'My Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Post'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
<div class="social-wrapper row">
    <div id="social-container">
        <div class="col-xs-12 col-sm-8 col-md-8">
			<?php if (!empty($posts)): ?>
			    <?php foreach($posts as $post): ?>
			        <div class="item widget-container fluid-height social-entry">
			            <div class="widget-content padded">
			                <div class="profile-info clearfix">
			                    <img width="50" height="50" class="social-avatar pull-left" src="<?= Yii::getAlias('@avatar') . User::getInfo($post['user_id'])['avatar'] ?>" />
			                    <div class="profile-details">
			                        <a class="user-name" href="<?= Url::toRoute(['/user/view', 'id'=>User::getInfo($post['user_id'])['username']]) ?>">
			                            <?= Html::encode(User::getInfo($post['user_id'])['username']) ?>
			                        </a>
			                        <p>
			                            <em><?= \app\components\Tools::formatTime($post['create_time']) ?></em>
			                        </p>
			                    </div>
			                </div>
			                <p class="content">
			                    <?php if (!empty($post['title'])): ?>
			                        <h3><?= Html::a(Html::encode($post['title']), ['/blog/post/view', 'id' => $post['id']]) ?></h3>
			                    <?php endif ?>
			                    <?= $post['content'] ?>
			                </p>
			            </div>
			        </div>
			    <?php endforeach; ?>
			<?php else: ?>
			    <div class="no-data-found">
			        <i class="glyphicon glyphicon-folder-open"></i>
			        No post to display.
			    </div>
			<?php endif; ?>
        </div>
    </div>
</div>
