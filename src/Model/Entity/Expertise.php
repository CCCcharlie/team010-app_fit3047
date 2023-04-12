<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Expertise Entity
 *
 * @property string $expertise_title
 * @property string $expertise_desc
 *
 * @property \App\Model\Entity\Staff[] $staff
 */
class Expertise extends Entity
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
        'expertise_desc' => true,
        'staff' => true,
    ];
}
