<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property string $p_title
 * @property int $p_type_id
 * @property int|null $p_user_id
 * @property string $p_detail
 * @property string|null $p_date
 * @property bool|null $p_status
 * @property int|null $p_views
 * @property \Cake\I18n\FrozenTime $p_created_at
 * @property \Cake\I18n\FrozenTime $p_updated_at
 *
 * @property \App\Model\Entity\Image[] $image
 * @property \App\Model\Entity\PostsType $posts_type
 * @property \App\Model\Entity\User $user
 */
class Post extends Entity
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
        'p_title' => true,
        'p_type_id' => true,
        'p_user_id' => true,
        'p_detail' => true,
        'p_date' => true,
        'p_status' => true,
        'p_views' => true,
        'p_created_at' => true,
        'p_updated_at' => true,
        'image' => true,
        'posts_type' => true,
        'user' => true,
    ];
}
