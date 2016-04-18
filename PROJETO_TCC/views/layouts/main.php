<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Cadastros', 'items' => [
                ['label' => 'Cursos', 'url' => 'index.php?r=curso/index'],
                    '<li class="divider"></li>',
                ['label' => 'Disciplinas', 'url' => 'index.php?r=disciplina/index'],
                    '<li class="divider"></li>',
                ['label' => 'Professores', 'url' => 'index.php?r=professor/index'],
                    '<li class="divider"></li>',
                ['label' => 'Situação', 'url' => 'index.php?r=situacao/index'],
                    '<li class="divider"></li>',
                ['label' => 'HAE', 'url' => 'index.php?r=horarios-externos/index'],
                    '<li class="divider"></li>',
                ['label' => 'Dia da semana', 'url' => 'index.php?r=dia-semana/index'],
            ]
            ],
            /*
             *
             * echo Nav::widget([
                                'label' => 'Dropdown',
                                    'items' => [
                                        ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                                        '<li class="divider"></li>',
                                        '<li class="dropdown-header">Dropdown Header</li>',
                                        ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
                                     ],
                                 ],
             *
             *
             *
             *
             */


            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
