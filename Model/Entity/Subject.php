<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subject Entity
 *
 * @property int $id
 * @property int $level_id
 * @property int $teacher_id
 * @property string $name
 *
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\Teacher $teacher
 */
class Subject extends Entity
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
        'id' => true,
        
        'name' => true,
        'level_id' => true,
        'teacher_id' => true
    ];
}
