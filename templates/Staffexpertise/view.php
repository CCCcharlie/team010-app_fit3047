<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staffexpertise $staffexpertise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Staffexpertise'), ['action' => 'edit', $staffexpertise->staff_exp_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Staffexpertise'), ['action' => 'delete', $staffexpertise->staff_exp_id], ['confirm' => __('Are you sure you want to delete # {0}?', $staffexpertise->staff_exp_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Staffexpertise'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Staffexpertise'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="staffexpertise view content">
            <h3><?= h($staffexpertise->staff_exp_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Staff') ?></th>
                    <td><?= $staffexpertise->has('staff') ? $this->Html->link($staffexpertise->staff->staff_id, ['controller' => 'Staff', 'action' => 'view', $staffexpertise->staff->staff_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Expertise Title') ?></th>
                    <td><?= h($staffexpertise->expertise_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff Exp Id') ?></th>
                    <td><?= $this->Number->format($staffexpertise->staff_exp_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Staffexpert Date Completed') ?></th>
                    <td><?= h($staffexpertise->staffexpert_date_completed) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
