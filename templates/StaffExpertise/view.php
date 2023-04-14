<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StaffExpertise $staffExpertise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Staff Expertise'), ['action' => 'edit', $staffExpertise->staff_exp_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Staff Expertise'), ['action' => 'delete', $staffExpertise->staff_exp_id], ['confirm' => __('Are you sure you want to delete # {0}?', $staffExpertise->staff_exp_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Staff Expertise'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Staff Expertise'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="staffExpertise view content">
            <h3><?= h($staffExpertise->staff_exp_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Staff') ?></th>
                    <td><?= $staffExpertise->has('staff') ? $this->Html->link($staffExpertise->staff->staff_id, ['controller' => 'Staff', 'action' => 'view', $staffExpertise->staff->staff_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Expertise Title') ?></th>
                    <td><?= h($staffExpertise->expertise_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff Exp Id') ?></th>
                    <td><?= $this->Number->format($staffExpertise->staff_exp_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Staffexpert Date Completed') ?></th>
                    <td><?= h($staffExpertise->staffexpert_date_completed) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
