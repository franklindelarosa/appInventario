<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <script type="text/javascript" charset="utf8" src="<?= Yii::$app->request->baseUrl; ?>/js/jquery.min.js"></script>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Elecsis',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-default',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Dispositivos', 'url' => ['/dispositivos/']],
                    ['label' => 'Sims', 'url' => ['/sims/']],
                    ['label' => 'Proveedores', 'url' => ['/proveedores/']],
                    ['label' => 'Clientes', 'url' => ['/clientes/']],
                    ['label' => 'Usuarios', 'url' => ['/clientes/']],
                    [
                       'label' => 'Otras opciones',
                       'items' => [
                             ['label' => 'Estados', 'url' => ['/estados/']],
                             ['label' => 'Planes', 'url' => ['/planes/']],
                             ['label' => 'Contactos', 'url' => ['/contactos/']],
                             ['label' => 'Historico', 'url' => ['/historicos/']],
                         ],
                     ],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
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
            <p class="pull-left">&copy; Elecsis <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>