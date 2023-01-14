<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Promotion Entity
 *
 * @property int $pr_id
 * @property string $pr_name
 * @property string $pr_detail
 * @property string $pr_image
 * @property string $pr_discount
 * @property \Cake\I18n\FrozenTime $pr_created
 * @property \Cake\I18n\FrozenTime $pr_updated
 */
class Promotion extends Entity
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
        'pr_name' => true,
        'pr_detail' => true,
        'pr_image' => true,
        'pr_discount' => true,
        'pr_created' => true,
        'pr_updated' => true,
    ];
}
