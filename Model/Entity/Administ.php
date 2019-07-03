<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Administ Entity
 *
 * @property int $administ_id
 * @property string $names
 * @property string $surnames
 * @property int $DNI
 * @property bool $gender
 * @property int $phone_number
 * @property string $email
 * @property string $address
 * @property \Cake\I18n\FrozenDate|null $birthday
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Administ extends Entity
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
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
