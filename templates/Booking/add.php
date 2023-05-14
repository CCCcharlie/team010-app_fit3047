<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 * @var \Cake\Collection\CollectionInterface|string[] $customer
 * @var \Cake\Collection\CollectionInterface|string[] $staff
 * @var \Cake\Collection\CollectionInterface|string[] $services
 */
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 * @var iterable<\App\Model\Entity\Service> $services
 * @var \Cake\Collection\CollectionInterface|string[] $staff
 * @var \Cake\Collection\CollectionInterface|string[] $services
 *
 */

//debug($services->image_name);
//
//debug($services->toList());
?>


<nav class="top-nav">
    <div class="top-nav-title">
<!--        datepicker-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



        <!--  In order to show the image from webroot/img/cake.icon.png,
        we must use $this->html->image instead of <img src=""> in this case for it to work -->

        <!-- <?php /*= "$this->Url->build('/')" */?> <- this line of code is for redirection, "/" is the root path-->
        <a href="<?= $this->Url->build('/') ?>"> <?= $this->Html->image('holistichealinglogofull.png', ['alt' => 'Holistic healing logo', 'class' => 'logo']); ?>
            <a href="<?= $this->Url->build('/') ?>">Holistic<span> Healings</a>
    </div>
    <div class="top-nav-links">
        <!--  target acts as where I want to display the href, _self is the default so it will update itself
         If _blank then it will appear as a new page when clicked, there are others like _parent and _top it does not seem
         to do anything substantial  more info here: https://www.w3schools.com/tags/att_a_target.asp -->

        <a target="_self" href="<?= $this->Url->build('/') ?>">To Home Page!</a>

        <?php if ($this->Identity->isLoggedIn()){
            $identity = $this->request->getAttribute('authentication')->getIdentity();

            echo "<br>";
            echo $this->Html->link(__('Site Editor'), ['controller' => 'Cb', 'action' => 'index']);
            echo " | " ;
            echo $this->Html->link(__('Customer Enquiry'), ['controller' => 'Enquiry', 'action' => 'index']);
            echo " | " ;
            echo $this->Html->link(__('Service List'), ['controller' => 'Services', 'action' => 'index']);
            echo " | " ;
            echo $this->Html->link(__('Bookings'), ['controller' => 'Booking', 'action' => 'index']);
            echo "<br>";
            echo $this->Html->link(__('Staff Overview'), ['controller' => 'Staff', 'action' => 'index']);
            echo " | " ;
            echo $this->Html->link(__('Home Page'), ['controller' => 'Pages', 'action' => 'home']);
            echo " | > " ;
            echo "Hi " . $identity->get('staff_fname');
            echo " < | " ;
            echo $this->Html->link(__('Logout'), ['controller' => 'Staff', 'action' => 'logout']);
        } else {
            echo "ㅤ";
        }
        ?>
        <!-- <a target="_self" rel="next" href="<?php /*= $this->Url->build('/staff') */?>>staffexpertise</a>  hide this for now because it breaks-->
    </div>
</nav>


<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('To services page'), ['controller'=>'services'], ['action' => 'index']) ?>

        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="booking form content">
            <?= $this->Form->create($booking) ?>
            <fieldset>
                <legend><?= __('Add Booking') ?></legend>

                <!-- Customer Information -->
                <h4><?= __('Customer Information') ?></h4>
                <?php
                echo $this->Form->control('cust_fname', ['label' => 'First Name']);
                echo $this->Form->control('cust_lname', ['label' => 'Last Name']);
                echo $this->Form->control('cust_phone', ['label' => 'Phone No']);
                echo $this->Form->control('cust_email', ['label' => 'E-mail']);
                __('Booking Information');
                echo $this->Form->control('staff_id', [
                    'label' => 'Pick from our available staff',
                    'options' => $staff,
                ]);
                echo $this->Form->control('service_id', [
                'label' => 'Pick from our many great services',
                    'id'=>"selectOption",
                    'onchange'=>"renderImage(this.value)",
                'options' => $services]);

                echo' <img id="myImg" src="compman.gif" width="107" height="98"/> ';

                echo $this->Form->control('eventstart', [
                'label' => 'Booking Time',
                'id'=>'datepicker',

                'timeFormat' => 'h:mm a']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),[        'style' => 'background-color: #ffc800'
            ]) ?>
            <?= $this->Form->end() ?>

        </div>
    </div>


    <script>

        //disable time period
        var disabledTimeSlots =<?=$toJson?>,
            disabledTimes = [];

        // Convert string to array and create objects with 'from' and 'to' properties
        disabledTimeSlots.forEach(function(timeSlot) {
            disabledTimes.push({
                from: timeSlot,
                to: timeSlot
            });
        });

        var datepicker = flatpickr("#datepicker", {
            enableTime: true, // enable time picker
            dateFormat: "Y-m-d H:i", // set date and time format
            minDate: "today", // set minimum date to today
            maxDate: new Date().fp_incr(30), // set maximum date to 30 days from today
            minTime: "9:00",
            maxTime: "22:00",//timepicker


        });


    </script>

    <script>        // show ima to services


        function renderImage() {
            var selected = document.getElementById("selectOption");
            var imgUrl = "";
            if (selected.value == 2) {
                imgUrl = "../img/user-img/YogaImage.PNG";
            } else if (selected.value == 3) {
                imgUrl = "../img/user-img/Counselling.PNG";
            } else if (selected.value == 4) {
                imgUrl = "../img/user-img/ArtTherapy.PNG";
            }
            else if (selected.value == 5) {
                imgUrl = "../img/user-img/Danceimage.PNG";
            }
            else {
                imgUrl = "../img/user-img/YogaImage.PNG";
            }

            document.getElementById("myImg").src = imgUrl;

        }
    </script>

</div>
