<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cb $cb
 * @var string[] $content_types
 */
?>
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
                <br>

<!--                --><?php //echo $this->Form->control('content_description', ['type'=>'textarea', 'style' => 'height: 10rem;']); ?>

                <!-- Displays the content of the previous value (which is your current value here)-->
<!--                <table>-->
<!--                    <tr>-->
<!--                        <th>--><?php //= __('Previous Value') ?><!--</th>-->
<!--                        <td>--><?php //if(!$cb->previous_value){
//                            echo h("No previous value");
//
//                                } else {
//                            echo h($cb->previous_value);
//                                }
//                            ?>
<!--                        </td>-->
<!--                    </tr>-->
<!--                </table>-->
                <br>


                <?php
//                    debug($content_types === "text");

//  content_value and content_image is simply the name of the field, not content_value in database
//  therefore I can add another validator rule for name content_value for texts and content_image for images
                    if ($cb->content_type == "text") {
                        echo $this->Form->control('content_value');
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
