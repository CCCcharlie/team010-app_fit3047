<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 */
?>
<nav class="top-nav">
    <div class="top-nav-title">
        <!--  In order to show the image from webroot/img/cake.icon.png,
        we must use $this->html->image instead of <img src=""> in this case for it to work -->

        <!-- <?php /*= "$this->Url->build('/')" */?> <- this line of code is for redirection, "/" is the root path-->
        <a href="<?= $this->Url->build('/cb') ?>"> <?= $this->Html->image('holistichealinglogofull.png', ['alt' => 'Holistic healing logo', 'class' => 'logo']); ?>
            <a href="<?= $this->Url->build('/cb') ?>"> Holistic Healings - Staff Page<span></a>
    </div>
    <div class="top-nav-links">
        <!--  target acts as where I want to display the href, _self is the default so it will update itself
         If _blank then it will appear as a new page when clicked, there are others like _parent and _top it does not seem
         to do anything substantial  more info here: https://www.w3schools.com/tags/att_a_target.asp -->

        <a target="_self" href="<?= $this->Url->build('/cb') ?>">Site Editor</a>
        <a target="_self" href="<?= $this->Url->build('/enquiry') ?>">Customer Enquiry</a>
        <a target="_self" href="<?= $this->Url->build('/services/admindex') ?>">Service List</a>
        <a target="_self" href="<?= $this->Url->build('/staff') ?>">Staff Overview</a>
        <a target="_self" href="<?= $this->Url->build('/staff/logout') ?>">Logout</a>

        <!-- <a target="_self" rel="next" href="<?php /*= $this->Url->build('/staff') */?>>staffexpertise</a>  hide this for now because it breaks-->
    </div>
</nav>
<div class="row">
    <aside class="column">
        <div class="side-nav">
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="staff form content">
            <?= $this->Form->create($staff) ?>
            <fieldset>
                <legend><?= __('Add a new Staff Account') ?></legend>
                <?php
                    echo $this->Form->control('staff_fname', ['label' => 'Staff First Name*']);
                    echo $this->Form->control('staff_lname', ['label' => 'Staff Last Name*']);
                    echo $this->Form->control('staff_position', ['label' => 'Staff Role*']);
                    echo $this->Form->control('staff_email', ['label' => 'Staff E-Mail*']);
                    echo $this->Form->control('staff_password', ['label' => 'Your Password*']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
