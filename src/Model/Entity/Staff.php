<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Staff Entity
 *
 * @property int $staff_id
 * @property string $staff_fname
 * @property string $staff_lname
 * @property string $staff_position
 * @property string $staff_email
 * @property string $staff_password
 */
class Staff extends Entity
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
        'staff_fname' => true,
        'staff_lname' => true,
        'staff_position' => true,
        'staff_email' => true,
//        'staff_password' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'staff_password',
    ];

    /**
     * Generate display field for User entity
     * @return string Display field
     */


    /**
     * Hashing password for Staff entity
     * @param string $staff_password Password field
     * @return string|null hashed password
     */
    protected function _setStaffPassword(string $staff_password): ?string {
        if (strlen($staff_password) > 0) {
            return (new DefaultPasswordHasher())->hash($staff_password);
        }
        return $staff_password;
    }

}
