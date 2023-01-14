<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int|null $orders_code
 * @property string $orders_token
 * @property int|null $orders_user_id
 * @property int|null $orders_admin_id
 * @property string|null $orders_detail
 * @property string|null $delivery_service
 * @property string|null $delivery_code
 * @property string|null $total_price
 * @property int|null $status
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\Image[] $image
 * @property \App\Model\Entity\User $user
 */
class Order extends Entity
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
        'orders_code' => true,
        'orders_token' => true,
        'orders_user_id' => true,
        'orders_admin_id' => true,
        'orders_detail' => true,
        'delivery_service' => true,
        'delivery_code' => true,
        'total_price' => true,
        'status' => true,
        'created_at' => true,
        'updated_at' => true,
        'image' => true,
        'user' => true,
    ];
}
