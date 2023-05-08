<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Booking Entity
 *
 * @property int $booking_id
 * @property \Cake\I18n\FrozenDate $booking_date
 * @property \Cake\I18n\Time $booking_time
 * @property  string cust_email
 * @property int $staff_id
 * @property int $service_id
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
        'booking_date' => true,
        'booking_time' => true,
        'cust_email' => true,
        'staff_id' => true,
        'service_id' => true,
        'customer' => true,
        'staff' => true,
        'service' => true,
    ];
}
