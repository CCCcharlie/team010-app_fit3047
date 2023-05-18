<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cb $cb
 * @var string[] $content_types
 */
?>
<header>
    <nav class="top-nav">
        <div class="top-nav-title">
            <!--  In order to show the image from webroot/img/cake.icon.png,
            we must use $this->html->image instead of <img src=""> in this case for it to work -->

            <!-- <?php /*= "$this->Url->build('/')" */?> <- this line of code is for redirection, "/" is the root path-->
            <a href="<?= $this->Url->build('/staff') ?>"> <?= $this->Html->image('holistichealinglogofull.png', ['alt' => 'Holistic healing logo', 'class' => 'logo']); ?>
                <a href="<?= $this->Url->build('/staff') ?>"> Holistic Healings - Staff Page<span></a>
        </div>



        <div class="top-nav-links">
            <!--  target acts as where I want to display the href, _self is the default so it will update itself
             If _blank then it will appear as a new page when clicked, there are others like _parent and _top it does not seem
             to do anything substantial  more info here: https://www.w3schools.com/tags/att_a_target.asp -->


            <!--        https://www.w3schools.com/howto/howto_css_dropdown.asp-->
            <a target="_self" href="<?= $this->Url->build('/') ?>">Home Page</a> |
            <a target="_self"  href="<?= $this->Url->build('/booking') ?>">Bookings</a> |
            <div class="dropdown ">
                <button class="dropbtn"> ☰ <i class="arrow down"></i>

                </button>
                <div class="dropdown-content">

                    <a target="_self"  href="<?= $this->Url->build('/enquiry') ?>">Customer Enquiries</a>
                    <a target="_self"  href="<?= $this->Url->build('/services/admindex') ?>">Service List</a>
                    <a target="_self"  href="<?= $this->Url->build('/staff') ?>">Staff Overview</a>
                    <a target="_self" href="<?= $this->Url->build('/cb') ?>">Site Editor</a>
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
</header>


<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
<!--            --><?php //= $this->Form->postLink(
//                __('Delete'),
//                ['action' => 'delete', $cb->id],
//                ['confirm' => __('Are you sure you want to delete # {0}?', $cb->id), 'class' => 'side-nav-item']
//            ) ?>
            <?= $this->Html->link(__('Return to List View'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cb form content">
            <?= $this->Form->create($cb, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Edit This Item') ?></legend>
                <p>Welcome to the Edit Page. Please make any changes below. </p>
                <table>
                <tr>
                <th><?= __('Hint: ') ?></th>
                <td><?= h($cb->hint) ?></td>

                </tr>
                </table>
                <!-- Constrain content type to be impossible to edit so that it doesnt break -->
                <table>
                <tr>
                    <th><?= __('Content Type') ?></th>
                    <td><?= h($cb->content_type) ?></td>
                    <th><?= __('Content Description') ?></th>
                    <td><?= h($cb->content_description) ?></td>
                </tr>
                </table>

<!--                --><?php //echo $this->Form->control('content_description', ['type'=>'textarea', 'style' => 'height: 10rem;']); ?>

                 <!-- Displays the content of the previous value (which is your current value here) -->
                <table>
                    <tr>
                        <th><?= __('Previous Value') ?></th>
                        <td><?php if(!$cb->previous_value){
                            echo h("No previous value");

                                } else {
                            echo h($cb->previous_value);
                                }
                            ?>
                        </td>
                    </tr>
                </table>
                <br>


                <?php
//                    debug($content_types === "text");

//  content_value and content_image is simply the name of the field, not content_value in database
//  therefore I can add another validator rule for name content_value for texts and content_image for images
                    if ($cb->content_type == "text") {
                        echo $this->Form->control('content_value', ['type'=>'textarea', 'style'=>'height: 20rem' ]);
                    }else {
                        echo $this->Form->control('content_image',['type'=>'file']);
                    }
                    //Validation for field names content_value and content_image is in CbTable.php
                    //(This is to ensure that content_value = string and content_image = file)
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<footer>

</footer>
