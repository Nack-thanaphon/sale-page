<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $about
 * @property string|null $adress
 * @property string|null $phone
 * @property string|null $facebook
 * @property string|null $line
 * @property string|null $instagram
 * @property string|null $tiktok
 * @property string|null $linetoken
 * @property string|null $lineoficial
 * @property string|null $paymentimg
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property \Cake\I18n\FrozenTime $created_at
 */
class Contact extends Entity
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
        'name' => true,
        'about' => true,
        'adress' => true,
        'phone' => true,
        'facebook' => true,
        'line' => true,
        'instagram' => true,
        'tiktok' => true,
        'linetoken' => true,
        'lineoficial' => true,
        'paymentimg' => true,
        'updated_at' => true,
        'created_at' => true,
    ];
}
