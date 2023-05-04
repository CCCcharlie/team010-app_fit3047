<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

$appLocale = Configure::read('App.defaultLocale');

$this->assign('title', 'Forget Password');
$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html lang="<?= $appLocale ?>">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?> - Holistic Healing
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
                        <legend><?= __('Forget Password') ?></legend>
                        <?= $this->Flash->render() ?>
                        <p>Enter your email address registered with our system below to reset your password: </p>
                        <?php
                        echo $this->Form->control('staff_email', [
                            'type' => 'email',
                            'required' => true,
                            'autofocus' => true,
                            'label' => false
                        ]);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Send verification email')) ?>
                    <?= $this->Form->end() ?>
                    <hr style="margin: 2rem 0 3rem 0">
                    <?= $this->Html->link(__('Back to login'), ['controller' => 'Staff', 'action' => 'login'], ['class' => 'button']) ?>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
