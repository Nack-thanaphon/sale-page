<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $user_type_id
 * @property int $user_role_id
 * @property string|null $address
 * @property string|null $image
 * @property string $password
 * @property string $token
 * @property string $verified
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 *
 * @property \App\Model\Entity\UsersRole $users_role
 * @property \App\Model\Entity\UsersType $users_type
 */
class User extends Entity
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
        'email' => true,
        'user_type_id' => true,
        'user_role_id' => true,
        'address' => true,
        'image' => true,
        'password' => true,
        'token' => true,
        'verified' => true,
        'status' => true,
        'created_at' => true,
        'updated_at' => true,
        'users_role' => true,
        'users_type' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
        'token',
    ];
}