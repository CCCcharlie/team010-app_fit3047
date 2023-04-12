<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Staffexpertise Entity
 *
 * @property int $staff_exp_id
 * @property int $staff_id
 * @property string $expertise_title
 * @property \Cake\I18n\FrozenDate $staffexpert_date_completed
 *
 * @property \App\Model\Entity\Staff $staff
 */
class Staffexpertise extends Entity
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
        'staff_id' => true,
        'expertise_title' => true,
        'staffexpert_date_completed' => true,
        'staff' => true,
    ];
}
