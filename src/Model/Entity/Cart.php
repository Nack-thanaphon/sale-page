<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cart Entity
 *
 * @property int $c_id
 * @property string $c_detail
 * @property int|null $c_user_id
 * @property string|null $c_status
 * @property \Cake\I18n\FrozenTime $c_created_at
 * @property \Cake\I18n\FrozenTime $c_updated_at
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Cartitem[] $cartitem
 */
class Cart extends Entity
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
        'c_detail' => true,
        'c_user_id' => true,
        'c_status' => true,
        'c_created_at' => true,
        'c_updated_at' => true,
        'product' => true,
        'cartitem' => true,
    ];
}
