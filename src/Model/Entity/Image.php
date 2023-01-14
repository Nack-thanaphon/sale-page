<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity
 *
 * @property int $id
 * @property int|null $post_id
 * @property int|null $product_id
 * @property int|null $order_id
 * @property string $name
 * @property int $status
 * @property int $cover
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\Post $post
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Order $order
 */
class Image extends Entity
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
        'post_id' => true,
        'product_id' => true,
        'order_id' => true,
        'name' => true,
        'status' => true,
        'cover' => true,
        'created_at' => true,
        'updated_at' => true,
        'post' => true,
        'product' => true,
        'order' => true,
    ];
}
