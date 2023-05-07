<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Service Entity
 *
 * @property int $service_id
 * @property string $service_name
 * @property \Cake\I18n\Time $service_duration
 * @property string $service_desc
 * @property string $service_price
 * @property string $image_name
 * @property bool $home
 */
class Service extends Entity
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
        'service_name' => true,
        'service_duration' => true,
        'service_desc' => true,
        'service_price' => true,
        'image_name' => true,
        'home' => true,
    ];

    public function __toString()
    {
        return $this->service_name; // 假设服务名称存储在 "name" 属性中
    }
}
