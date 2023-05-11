<?php
/**
 * Reset Password HTML email template
 *
 * @var \App\View\AppView $this
 * @var string $first_name email recipient's first name
 * @var string $last_name email recipient's last name
 * @var string $email email recipient's email address
 * @var string $nonce nonce used to reset the password
 */
?>
<div class="content">
    <!-- START CENTERED WHITE CONTAINER -->
    <table role="presentation" class="main">
        <!-- START MAIN CONTENT AREA -->
                            <h3>Holistic Healing Staff Portal - Reset your account password</h3>
                            <p>Hi <?= h($first_name) ?>, </p>
                            <p>Thank you for your request to reset the password of your account on <b>Holistic Healing</b>. </p>
                            <br>
                            <p>To reset your account password, use the button below to access the reset password page: </p>

                            <a href="<?= $this->Url->build(['controller' => 'Staff', 'action' => 'resetpassword', $nonce], ['fullBase' => true]) ?>" target="_blank">Reset account password</a> <br>

                            <p>or use the following link: <br><br>
                       <?= $this->Html->link($this->Url->build(['controller' => 'Staff', 'action' => 'resetpassword', $nonce], ['fullBase' => true]), ['controller' => 'Staff', 'action' => 'resetpassword', $nonce], ['fullBase' => true, 'style' => 'word-break:break-all']) ?></p>

        <!-- END MAIN CONTENT AREA -->
    </table>
    <!-- END CENTERED WHITE CONTAINER -->
    <!-- START FOOTER -->
    <div class="footer">
        <table role="presentation" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td class="content-block">
                    This email is addressed to <?= $first_name ?>  <?= $last_name ?> &lt;<?= $email ?>&gt;<br>
                    This e-mail is only for Holistic Healing Staff Please discard this email if it not meant for you
                    <br>
                    <br>
                    Copyright &copy; <?= date("Y"); ?> Holisitc Healing
                </td>
            </tr>
        </table>
    </div>
    <!-- END FOOTER -->
</div>
