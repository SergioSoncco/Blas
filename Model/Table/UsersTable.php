<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\AdministsTable|\Cake\ORM\Association\HasMany $Administs
 * @property \App\Model\Table\ArticlesTable|\Cake\ORM\Association\HasMany $Articles
 * @property \App\Model\Table\OperationsTable|\Cake\ORM\Association\HasMany $Operations
 * @property \App\Model\Table\StudentsTable|\Cake\ORM\Association\HasMany $Students
 * @property \App\Model\Table\TeachersTable|\Cake\ORM\Association\HasMany $Teachers
 * @property \App\Model\Table\UssTable|\Cake\ORM\Association\HasMany $Uss
 * @property \App\Model\Table\Uss1Table|\Cake\ORM\Association\HasMany $Uss1
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Administs', [
            'foreignKey' => 'user_id'
        ]);
        
        $this->hasMany('Students', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Teachers', [
            'foreignKey' => 'user_id'
        ]);
     
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->integer('role')
            ->requirePresence('role', 'create')
            ->allowEmptyString('role', false);

        $validator
            ->scalar('username')
            ->maxLength('username', 20)
            ->requirePresence('username', 'create')
            ->allowEmptyString('username', false)
	    ->notEmpty('username', 'Rellene este campo')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 50)
            ->requirePresence('password', 'create')
	    ->notEmpty('password', 'Rellene este campo')
            ->allowEmptyString('password', false);

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        $validator
            ->scalar('names')
            ->maxLength('names', 50)
            ->requirePresence('names', 'create')
	    ->notEmpty('names', 'Rellene este campo')
            ->allowEmptyString('names', false);

        $validator
            ->scalar('surnames')
            ->maxLength('surnames', 50)
            ->requirePresence('surnames', 'create')
	    ->notEmpty('surnames', 'Rellene este campo')
            ->allowEmptyString('surnames', false);

        $validator
            ->integer('DNI')
            ->requirePresence('DNI', 'create')
            ->allowEmptyString('DNI', false)
	    ->notEmpty('DNI', 'Rellene este campo')
            ->add('DNI', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->boolean('gender')
	    ->notEmpty('gender', 'Rellene este campo')
            ->allowEmptyString('gender');

        $validator
            ->integer('phone_number')
	    ->notEmpty('phone_number', 'Rellene este campo')
            ->allowEmptyString('phone_number');

        $validator
            ->email('email')
	    ->notEmpty('email', 'Rellene este campo')
            ->requirePresence('email', 'create')
	    ->add('email', 'valid', ['rule' => 'email'])
            ->allowEmptyString('email', false);

        $validator
            ->scalar('address')
	    ->notEmpty('adress', 'Rellene este campo')
            ->allowEmptyString('address');

        $validator
            ->date('birthday')
            ->allowEmptyDate('birthday');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['DNI']));

        return $rules;
    }
}
