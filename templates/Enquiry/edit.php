<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 * @var \App\Model\Entity\ContentBlock $contentBlock
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
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $enquiry->enquiry_id],
                ['confirm' => __('Are you sure you want to delete # {0}? This change cannot be undone!', $enquiry->enquiry_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Return to Enquiry Page'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="enquiry form content">
            <?= $this->Form->create($enquiry) ?>
            <fieldset>
                <legend><?= __('Edit Enquiry') ?></legend>
                <?php
                    echo $this->Form->control('Name');
                    echo $this->Form->control('Email');
                    echo $this->Form->control('Phone');
                    echo $this->Form->control('Message');
                $this->Html->link(__('List Content Blocks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    </div>
</div>
