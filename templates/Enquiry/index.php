<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Enquiry> $enquiry
 */
?>
<div class="enquiry index content">
<!--    --><?php //= $this->Html->link(__('New Enquiry'), ['action' => 'add'], ['class' => 'button float-right']) ?>
<!--    <h2>--><?php //= __('Customer Enquiries') ?><!--</h2>-->
    <p>Here you can see all your enquiries.</p><br>
    <p>Click 'Edit Enquiry' to edit your enquiry. (eg. If you notice an error in the details.)</p>
    <p>Click 'Delete Enquiry' to delete an enquiry. (eg. If you notice a spam/duplicate enquiry.)</p>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Name') ?></th>
                    <th><?= $this->Paginator->sort('Email') ?></th>
                    <th><?= $this->Paginator->sort('Phone') ?></th>
                    <th><?= $this->Paginator->sort('Message') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($enquiry as $enquiry): ?>
                <tr>
                    <td><?= h($enquiry->Name) ?></td>
                    <td><?= h($enquiry->Email) ?></td>
                    <td><?= h($enquiry->Phone) ?></td>
                    <td><?= h($enquiry->Message) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $enquiry->enquiry_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enquiry->enquiry_id], ['confirm' => __('Are you sure you want to delete # {0}? This change cannot be undone!', $enquiry->enquiry_id)]) ?>
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
