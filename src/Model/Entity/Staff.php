<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
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
 * @property string|null $nonce
 * @property \Cake\I18n\FrozenTime $nonce_expiry

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
        'staff_password' => true,
        'nonce' => true,
        'expiry' => true,

    ];

/**
* Generate display field for User entity
* @return string Display field
*/
    protected function _getStaffFullDisplay(): string {
        return $this->staff_fname . ' ' . $this->staff_lname . ' (' . $this->staff_email . ')';
    }

    protected function _setStaffPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
