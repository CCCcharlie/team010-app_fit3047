<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Staff> $staff
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

    <div class="cb index content">



</nav>


<div class="staff index content">

    <?= $this->Html->link(__('Add A Staff Member'), ['action' => 'add'], ['class' => 'button float-right']) ?>

    <h2><?= __('Staff') ?></h2>
    <p>Here you can see all the staff.</p><br>
    <p>All staff have a role. If your role is 'Admin'. You can edit the roles/details of other staff,  & create other staff accounts.</p><br>
    <p>If your role is staff, you may simply view the staff. </p>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort(__('Staff First Name', 'staff_fname')) ?></th>
                    <th><?= $this->Paginator->sort(__('Staff Last Name', 'staff_lname')) ?></th>
                    <th><?= $this->Paginator->sort('staff_position') ?></th>
                    <th><?= $this->Paginator->sort('staff_email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($staff as $staff): ?>
                <tr>
                    <td><?= h($staff->staff_fname) ?></td>
                    <td><?= h($staff->staff_lname) ?></td>
                    <td><?= h($staff->staff_position) ?></td>
                    <td><?= h($staff->staff_email) ?></td>
                    <td class="actions">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $staff->staff_id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $staff->staff_id], [
                                'confirm' => __('Are you sure you want to delete {0} {1}\'s account?', $staff->staff_fname, $staff->staff_lname)
                            ]) ?>

<!--                        --><?php //= $this->Html->link(__('Edit'), ['action' => 'edit', $staff->staff_id]) ?>
<!--                        --><?php //= $this->Form->postLink(__('Delete'), ['action' => 'delete', $staff->staff_id], [
//                            'confirm' => __('Are you sure you want to delete {0} {1}\'s account?', $staff->staff_fname, $staff->staff_lname)
//                        ]) ?>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
