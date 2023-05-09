<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Booking Entity
 *
 * @property int $booking_id
 * @property \Cake\I18n\FrozenTime $eventstart
 * @property int $staff_id
 * @property int $service_id
 * @property string $cust_fname
 * @property string $cust_lname
 * @property string $cust_phone
 * @property string $cust_email
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Staff $staff
 * @property \App\Model\Entity\Service $service
 */
class Booking extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'eventstart' => true,
        'staff_id' => true,
        'service_id' => true,
        'cust_fname' => true,
        'cust_lname' => true,
        'cust_phone' => true,
        'cust_email' => true,
        'customer' => true,
        'staff' => true,
        'service' => true,
    ];
}
