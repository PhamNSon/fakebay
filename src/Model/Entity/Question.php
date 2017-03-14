<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $from_user_id
 * @property int $to_user_id
 * @property string $message
 * @property bool $status
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\FromUser $from_user
 * @property \App\Model\Entity\ToUser $to_user
 */
class Question extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
