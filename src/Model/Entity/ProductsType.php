<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductsType Entity
 *
 * @property int $p_id
 * @property int $pt_user_id
 * @property int $pt_name
 * @property \Cake\I18n\FrozenTime $pt_created_at
 * @property \Cake\I18n\FrozenTime $pt_updated_at
 */
class ProductsType extends Entity
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
        'pt_user_id' => true,
        'pt_name' => true,
        'pt_created_at' => true,
        'pt_updated_at' => true,
    ];
}
