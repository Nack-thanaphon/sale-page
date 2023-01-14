<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cartitem Entity
 *
 * @property int $cart_id
 * @property int $cart_user_id
 * @property int $cart_product_id
 * @property int $cart_qty
 * @property \Cake\I18n\FrozenTime $c_created_at
 * @property \Cake\I18n\FrozenTime $c_updated_at
 */
class Cartitem extends Entity
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
        'cart_user_id' => true,
        'cart_product_id' => true,
        'cart_qty' => true,
        'c_created_at' => true,
        'c_updated_at' => true,
    ];
}
