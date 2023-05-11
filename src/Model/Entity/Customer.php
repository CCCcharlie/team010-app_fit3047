<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $cust_id
 * @property string $cust_fname
 * @property string $cust_lname
 * @property int $cust_phone
 * @property string $cust_email
 */
class Customer extends Entity
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
        'cust_fname' => true,
        'cust_lname' => true,
        'cust_phone' => true,
        'cust_startdate' => true,
        'cust_email' => true,
        'cust_password' => true,
    ];
}
