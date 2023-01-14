<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $p_id
 * @property int $p_user_id
 * @property string $p_title
 * @property int $p_type_id
 * @property string $p_detail
 * @property string $p_price
 * @property int $p_total
 * @property int|null $p_promotion
 * @property int $status
 * @property \Cake\I18n\FrozenTime $p_created_at
 * @property \Cake\I18n\FrozenTime $p_updated_at
 *
 * @property \App\Model\Entity\Image[] $image
 * @property \App\Model\Entity\ProductsType $products_type
 */
class Product extends Entity
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
        'p_user_id' => true,
        'p_title' => true,
        'p_type_id' => true,
        'p_detail' => true,
        'p_price' => true,
        'p_total' => true,
        'p_promotion' => true,
        'status' => true,
        'p_created_at' => true,
        'p_updated_at' => true,
        'image' => true,
        'products_type' => true,
    ];
}
