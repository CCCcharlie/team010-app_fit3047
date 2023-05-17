<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Enquiry> $enquiry
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

        <a target="_self" href="<?= $this->Url->build('/') ?>">Home Page</a> |
        <a target="_self" href="<?= $this->Url->build('/cb') ?>">Site Editor</a> |
        <div class="dropdown ">
            <button class="dropbtn"> ☰ <i class="arrow down"></i>

            </button>
            <div class="dropdown-content">

                <a target="_self"  href="<?= $this->Url->build('/enquiry') ?>">Customer Enquiry</a> |
                <a target="_self"  href="<?= $this->Url->build('/services/admindex') ?>">Service List</a> |
                <a target="_self"  href="<?= $this->Url->build('/booking') ?>">Bookings</a> |
                <a target="_self"  href="<?= $this->Url->build('/staff') ?>">Staff Overview</a> |
            </div>
        </div>

        <br>
        <!-- To obtain the identity, use $identity = $this->request->getAttribute('authentication')->getIdentity(); to find the currently logged in entity
to get the name or any value in the staff table, use the get and then the name of the attribute $identity->get('staff_fname')-->
        <?php $identity = $this->request->getAttribute('authentication')->getIdentity();
        //debug($identity->get('staff_fname'));
        //exit();
        ?>
        > Hi <?php echo $identity->get('staff_fname')?> <  <?= "|" ?>
        <a target="_self" href="<?= $this->Url->build('/staff/logout') ?>">Logout</a>

        <!-- <a target="_self" rel="next" href="<?php /*= $this->Url->build('/staff') */?>>staffexpertise</a>  hide this for now because it breaks-->
    </div>
</nav>
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

                    <th><?= $this->Paginator->sort('replied') ?></th>
                    <th><?= $this->Paginator->sort('Created') ?></th>


                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($enquiry as $enquiry): ?>
                <tr>
                    <td><?= h($enquiry->Name) ?></td>
                    <td><?= h($enquiry->Email) ?></td>
                    <td><?= h($enquiry->Phone) ?></td>
                    <td style="word-break: break-all" ><?= h($enquiry->Message) ?></td>

                    <td><?= $enquiry->replied ? "✅" : "❌" ?></td>
                    <td><?= h($enquiry->created) ?></td>
                    <td class="actions">

                        <?php
                        //if true means it has been read, so show as mark as unread
                        if ($enquiry->replied) {
                            echo $this->Form->postLink(__('Mark as Unread'), ['action' => 'update_replied', $enquiry->enquiry_id], ['confirm' => __("Are you sure you want to mark this message as unread? \nFrom: {0} {1} ", $enquiry->Name, $enquiry->Email)]);
                        } else {
                            echo $this->Form->postLink(__('Mark as Replied'), ['action' => 'update_replied', $enquiry->enquiry_id], ['confirm' => __("Are you sure you want to mark this message as replied? \nFrom: {0} {1} ", $enquiry->Name, $enquiry->Email)]);
                        }
                        echo "<br>";
                        echo "<hr>";
                        ?>

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
