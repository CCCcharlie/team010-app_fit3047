<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expertise $expertise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Expertise'), ['action' => 'edit', $expertise->expertise_title], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Expertise'), ['action' => 'delete', $expertise->expertise_title], ['confirm' => __('Are you sure you want to delete # {0}?', $expertise->expertise_title), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Expertise'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Expertise'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="expertise view content">
            <h3><?= h($expertise->expertise_title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Expertise Title') ?></th>
                    <td><?= h($expertise->expertise_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Expertise Desc') ?></th>
                    <td><?= h($expertise->expertise_desc) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Staff') ?></h4>
                <?php if (!empty($expertise->staff)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Staff Id') ?></th>
                            <th><?= __('Staff Fname') ?></th>
                            <th><?= __('Staff Lname') ?></th>
                            <th><?= __('Staff Position') ?></th>
                            <th><?= __('Staff Email') ?></th>
                            <th><?= __('Staff Password') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($expertise->staff as $staff) : ?>
                        <tr>
                            <td><?= h($staff->staff_id) ?></td>
                            <td><?= h($staff->staff_fname) ?></td>
                            <td><?= h($staff->staff_lname) ?></td>
                            <td><?= h($staff->staff_position) ?></td>
                            <td><?= h($staff->staff_email) ?></td>
                            <td><?= h($staff->staff_password) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Staff', 'action' => 'view', $staff->staff_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Staff', 'action' => 'edit', $staff->staff_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Staff', 'action' => 'delete', $staff->staff_id], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->staff_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
