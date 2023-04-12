<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Staffexpertise Model
 *
 * @property \App\Model\Table\StaffTable&\Cake\ORM\Association\BelongsTo $Staff
 *
 * @method \App\Model\Entity\Staffexpertise newEmptyEntity()
 * @method \App\Model\Entity\Staffexpertise newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Staffexpertise[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Staffexpertise get($primaryKey, $options = [])
 * @method \App\Model\Entity\Staffexpertise findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Staffexpertise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Staffexpertise[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Staffexpertise|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staffexpertise saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staffexpertise[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staffexpertise[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staffexpertise[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staffexpertise[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StaffexpertiseTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('staffexpertise');
        $this->setDisplayField('staff_exp_id');
        $this->setPrimaryKey('staff_exp_id');

        $this->belongsTo('Staff', [
            'foreignKey' => 'staff_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('staff_id')
            ->notEmptyString('staff_id');

        $validator
            ->scalar('expertise_title')
            ->maxLength('expertise_title', 64)
            ->requirePresence('expertise_title', 'create')
            ->notEmptyString('expertise_title');

        $validator
            ->date('staffexpert_date_completed')
            ->requirePresence('staffexpert_date_completed', 'create')
            ->notEmptyDate('staffexpert_date_completed');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('staff_id', 'Staff'), ['errorField' => 'staff_id']);

        return $rules;
    }
}
