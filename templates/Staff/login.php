<!-- in /templates/Staff/login.php -->
<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('staff_email', ['required' => true]) ?>
        <?= $this->Form->control('staff_password', ['required' => true, 'type'=>"password"]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>

    <?= $this->Html->link("Add Staff", ['action' => 'add']) ?>
</div>
