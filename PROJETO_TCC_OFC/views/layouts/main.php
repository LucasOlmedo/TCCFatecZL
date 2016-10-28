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
<?php
    $this->beginPage()
?>
<!DOCTYPE html>
<html lang="<?=
        Yii::$app->language
?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php
        $this->beginBody()
    ?>
<div class="wrap">

    <?php
    include '../web/validacaoUsuario.php';
    NavBar::begin([
        'brandLabel' => 'FATEC Zona Leste - Sistema Gerenciador',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if(!isset($_SESSION['usuario']['ID_CURSO'])){
      echo Nav::widget([
          'options' => ['class' => 'navbar-nav navbar-right'],
          'encodeLabels' => false,
          'items' => [
              ['label' => '<span class="glyphicon glyphicon-home"></span> Home', 'url' => ['/site/index']],
  //            ['label' => 'About', 'url' => ['/site/about']],
              ['label' => '<span class="glyphicon glyphicon-th-list"></span> Cadastros', 'items' => [
                  ['label' => 'Cursos', 'url' => 'index.php?r=curso/index'],
                      '<li class="divider"></li>',
                  ['label' => 'Períodos', 'url' => 'index.php?r=periodo/index'],
                      '<li class="divider"></li>',
                  ['label' => 'Disciplinas', 'url' => 'index.php?r=disciplina/index'],
                      '<li class="divider"></li>',
                  ['label' => 'Professores', 'url' => 'index.php?r=professor/index'],
                      '<li class="divider"></li>',
                  ['label' => 'Situação', 'url' => 'index.php?r=situacao/index'],
                      '<li class="divider"></li>',
                  ['label' => 'Horarios', 'url' => 'index.php?r=horarios-externos/index'],
                      '<li class="divider"></li>',
                  ['label' => 'Aula Semestral', 'url' => 'index.php?r=aula-semestral/index'],
                      '<li class="divider"></li>',
                  ['label' => 'Dia da semana', 'url' => 'index.php?r=dia-semana/index'],
                      '<li class="divider"></li>',
                  ['label' => 'Usuários', 'url' => '/usuarios.php']
              ]
              ],
  //            ['label' => 'Contact', 'url' => ['/site/contact']],
  //            Yii::$app->user->isGuest ? (
  //            ['label' => 'Login', 'url' => ['/site/login']]
  //            ) : (
  //                '<li>'
  //                . Html::beginForm(['/site/logout'], 'post')
  //                . Html::submitButton(
  //                    'Logout (' . Yii::$app->user->identity->username . ')',
  //                    ['class' => 'btn btn-link']
  //                )
  //                . Html::endForm()
  //                . '</li>'
  //            )
          ],
      ]);
    }
    else{
      echo Nav::widget([
          'options' => ['class' => 'navbar-nav navbar-right'],
          'encodeLabels' => false,
          'items' => [
              ['label' => '<span class="glyphicon glyphicon-home"></span> Home', 'url' => ['/site/index']],
  //            ['label' => 'About', 'url' => ['/site/about']],
              ['label' => '<span class="glyphicon glyphicon-th-list"></span> Cadastros', 'items' => [
                  ['label' => 'Cursos', 'url' => 'index.php?r=curso%2Fview&id='.$_SESSION['usuario']['ID_CURSO']],
                      '<li class="divider"></li>',
                  ['label' => 'Períodos', 'url' => 'index.php?r=periodo/index'],
                      '<li class="divider"></li>',
                  ['label' => 'Disciplinas', 'url' => 'index.php?r=disciplina/index'],
                      '<li class="divider"></li>',
                  ['label' => 'Professores', 'url' => 'index.php?r=professor/index'],
                      '<li class="divider"></li>',
                  ['label' => 'Situação', 'url' => 'index.php?r=situacao/index'],
                      '<li class="divider"></li>',
                  ['label' => 'Horarios', 'url' => 'index.php?r=horarios-externos/index'],
                      '<li class="divider"></li>',
                  ['label' => 'Aula Semestral', 'url' => 'index.php?r=aula-semestral/index'],
                      '<li class="divider"></li>',
                  ['label' => 'Dia da semana', 'url' => 'index.php?r=dia-semana/index']
              ]
              ],
  //            ['label' => 'Contact', 'url' => ['/site/contact']],
  //            Yii::$app->user->isGuest ? (
  //            ['label' => 'Login', 'url' => ['/site/login']]
  //            ) : (
  //                '<li>'
  //                . Html::beginForm(['/site/logout'], 'post')
  //                . Html::submitButton(
  //                    'Logout (' . Yii::$app->user->identity->username . ')',
  //                    ['class' => 'btn btn-link']
  //                )
  //                . Html::endForm()
  //                . '</li>'
  //            )
          ],
      ]);
    }

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
        <p class="pull-left">&copy; FATEC Zona Leste <?= date('Y') ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
