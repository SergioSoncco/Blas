<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property int $id
 * @property int $role
 * @property string $username
 * @property string $password
 * @property bool|null $status
 * @property string $names
 * @property string $surnames
 * @property int $DNI
 * @property bool|null $gender
 * @property int|null $phone_number
 * @property string $email
 * @property string|null $address
 * @property \Cake\I18n\FrozenDate|null $birthday
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Administ[] $administs
 * @property \App\Model\Entity\Article[] $articles
 * @property \App\Model\Entity\Operation[] $operations
 * @property \App\Model\Entity\Student[] $students
 * @property \App\Model\Entity\Teacher[] $teachers
 * @property \App\Model\Entity\Us[] $uss
 * @property \App\Model\Entity\Uss1[] $uss1
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
     * @var array
     */
    protected $_accessible = [
        'role' => true,
        'username' => true,
        'password' => true,
        'status' => true,
        'names' => true,
        'surnames' => true,
        'DNI' => true,
        'gender' => true,
        'phone_number' => true,
        'email' => true,
        'address' => true,
        'birthday' => true,
        'created' => true,
        'modified' => true,
        'administs' => true,
        'students' => true,
        'level' => true,
        'teachers' => true
          
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value)
	{
	if (strlen($value)) {
		$hasher = new DefaultPasswordHasher();
		return $hasher->hash($value);
	}
   }



}
