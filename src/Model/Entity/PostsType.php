<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PostsType Entity
 *
 * @property int $pt_id
 * @property string $pt_name
 * @property \Cake\I18n\FrozenTime $pt_created_at
 * @property \Cake\I18n\FrozenTime $pt_updated_at
 *
 * @property \App\Model\Entity\Post $post
 */
class PostsType extends Entity
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
        'pt_name' => true,
        'pt_created_at' => true,
        'pt_updated_at' => true,
        'post' => true,
    ];
}
