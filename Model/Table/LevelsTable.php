<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Levels Model
 *
 * @method \App\Model\Entity\Level get($primaryKey, $options = [])
 * @method \App\Model\Entity\Level newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Level[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Level|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Level saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Level patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Level[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Level findOrCreate($search, callable $callback = null, $options = [])
 */
class LevelsTable extends Table
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

        $this->setTable('levels');
        $this->setDisplayField('name');
        $this->setPrimaryKey('level_id');

        $this->hasMany('Subjects', [
            'foreignKey' => 'level_id'
        ]);

         $this->hasMany('Students', [
            'foreignKey' => 'level'
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
            ->integer('level_id')
            ->allowEmptyString('level_id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false)
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('classroom')
            ->maxLength('classroom', 255)
            ->requirePresence('classroom', 'create')
            ->allowEmptyString('classroom', false);

        return $validator;
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
