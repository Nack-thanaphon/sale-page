<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Branch Entity
 *
 * @property int $id
 * @property string|null $b_name
 * @property string|null $b_province
 * @property string|null $b_map
 * @property int|null $b_status
 * @property string|null $b_phone
 * @property string|null $b_link
 * @property \Cake\I18n\FrozenTime|null $b_created_at
 */
class Branch extends Entity
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
        'b_name' => true,
        'b_province' => true,
        'b_map' => true,
        'b_status' => true,
        'b_phone' => true,
        'b_link' => true,
        'b_created_at' => true,
    ];
}
