<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cb> $cb
 *
 */
$cakeDescription = 'Holistic Healing - Site Editor';
?>
<div class="cb index content">
    <h2><?= __('Site Content Editor') ?></h2>
    <p>This is the site content editor. It's here to let you change your website and keep things up to-date.</p><br>
    <p>If you wish to change services see the navigation bar above.</p><br><br>
    <p>It should be stated that this content editor will not allow you to dramatically change this website, only change the elements already in place. </p> <br>
    <p>Unsure how to edit? Follow the tips listed here: </p><br>
    <p>. Find the piece you want to edit through using both the hint (That's what it's called in the web-page.) And the description.</p><br>
    <p>. Click 'Edit' on the Actions Column. You can also click view if you wish to see this item on its own.</p>
    <p>. Change the content to your desires. At the moment, images can be replaced and text can be edited.</p>
    <p>. Hit submit. Your changes should apply to the website instantly. </p> <br>
    <p>Success! </p><br><br>
    <p>Note: Certain will not apply if the user has not cleared their cache recently.</p>
    <p></p>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('hint') ?> aka. The Object You're Editing.</th>
                    <th><?= $this->Paginator->sort('content_type') ?></th>
                    <th><?= $this->Paginator->sort('content_description') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cb as $cb): ?>
                <tr>
                    <td><?= h($cb->hint) ?></td>
                    <td><?= h($cb->content_type) ?></td>
                    <td><?= h($cb->content_description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cb->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cb->id]) ?>
<!--                        --><?php //= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cb->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cb->id)]) ?>
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
