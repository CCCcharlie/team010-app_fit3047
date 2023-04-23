<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cb> $cb
 *
 */
$cakeDescription = 'Holistic Healing - Site Editor';
?>

<!--Fix because apparently it won't close on its own-->
<div class="cb index content">
    <style>
        /* your CSS styles here */
        .accordion-panel {
            display: none;
        }
    </style>
    <h2><?= __('Site Content Editor') ?></h2>


    <div class="accordion cb">
        <div class="accordion-header button">
            <span class="icon">&#9654;</span> Welcome to the Site Content Editor. If you are unsure of how to use this page. Click me! <br>
        </div>
        <div class="accordion-panel">
            <p>This is the site content editor. It's here to let you change your website and keep things up to-date.</p><br>
            <p>If you wish to go to other components of site, please use the navigation bar above.</p><br>
            <p>It should be stated that this content editor will not allow you to dramatically change this website, only change the elements already in place. </p> <br>
            <p>Don't know how to edit? Follow the tips listed here: </p><br>
            <p>i.) Find the piece you want to edit through using both the hint and the description.</p>
            <p>ii.) Click 'Edit' on the Actions Column.</p>
            <p>iii.) Change the content to your desires. </p>
            <p>iv.) Hit submit. Your changes should apply to the website instantly. </p> <br>
            <p>Success! </p><br>
        </div>
    </div>



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
                        <?= $this->Html->link(__('Edit Me!'), ['action' => 'edit', $cb->id]) ?>
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

<script>
    var acc = document.querySelectorAll(".accordion-header");
    var i =0;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            /* Toggle active class to expand/collapse panel */
            this.classList.toggle("active");

            /* Toggle display property of panel to show/hide content */
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>
