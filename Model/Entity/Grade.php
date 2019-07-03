<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Grade Entity
 *
 * @property int $id
 * @property int $subject_id
 * @property int $student_id
 * @property float $grade_1
 * @property float $grade_2
 * @property float $grade_3
 * @property int|null $average
 *
 * @property \App\Model\Entity\Subject $subject
 * @property \App\Model\Entity\Student $student
 */
class Grade extends Entity
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
        'subject_id' => true,
	'user' =>true,
        'student_id' => true,
        'grade_1' => true,
        'grade_2' => true,
        'grade_3' => true,
        'average' => true,
        'subject' => true,
        'student' => true
    ];
}
