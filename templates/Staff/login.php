<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

$appLocale = Configure::read('App.defaultLocale');

$this->assign('title', 'Login');
$this->disableAutoLayout();  // for Home page
?>
<!DOCTYPE html>
<html lang="<?= $appLocale ?>">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?> - Cake CMS/Auth Sample
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<main class="main">
    <div class="container login">
        <div class="row">
            <div class="column column-50 column-offset-25">
                <div class="users form content">
                    <?= $this->Form->create() ?>
                    <fieldset>
                        <legend><?= __('Login') ?></legend>
                        <?= $this->Flash->render() ?>
                        <?php
                        echo $this->Form->control('staff_email', [
                            'type' => 'email',
                            'required' => true,
                            'autofocus' => true
                        ]);
                        echo $this->Form->control('staff_password', [
                            'type' => 'password',
                            'required' => true,
                            'value' => ''
                        ]);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Login')) ?>
                    <?= $this->Html->link(__('Forget password?'), ['controller' => 'Users', 'action' => 'forgetPassword'], ['class' => 'button button-outline']) ?>
                    <?= $this->Form->end() ?>
                    <hr style="margin: 2rem 0 3rem 0">
                    <?= $this->Html->link(__('Register new user'), ['controller' => 'Users', 'action' => 'register'], ['class' => 'button button-clear']) ?>
                    <?= $this->Html->link(__('Go to Homepage'), '/', ['class' => 'button button-clear']) ?>
                </div>
            </div>
        </div>
    </div>
</main>
<footer>
    <?= $this->fetch('footer_script') ?>
</footer>
</body>
</html>
