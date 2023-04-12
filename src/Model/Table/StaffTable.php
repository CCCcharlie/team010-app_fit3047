<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Staff Model
 *
 * @property \App\Model\Table\ExpertiseTable&\Cake\ORM\Association\BelongsToMany $Expertise
 *
 * @method \App\Model\Entity\Staff newEmptyEntity()
 * @method \App\Model\Entity\Staff newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Staff[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Staff get($primaryKey, $options = [])
 * @method \App\Model\Entity\Staff findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Staff patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Staff[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Staff|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staff saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StaffTable extends Table
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

        $this->setTable('staff');
        $this->setDisplayField('staff_id');
        $this->setPrimaryKey('staff_id');

        $this->belongsToMany('Expertise', [
            'foreignKey' => 'staff_id',
            'targetForeignKey' => 'expertise_id',
            'joinTable' => 'staff_expertise',
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
            ->scalar('staff_fname')
            ->maxLength('staff_fname', 64)
            ->requirePresence('staff_fname', 'create')
            ->notEmptyString('staff_fname');

        $validator
            ->scalar('staff_lname')
            ->maxLength('staff_lname', 64)
            ->requirePresence('staff_lname', 'create')
            ->notEmptyString('staff_lname');

        $validator
            ->scalar('staff_position')
            ->maxLength('staff_position', 20)
            ->requirePresence('staff_position', 'create')
            ->notEmptyString('staff_position');

        $validator
            ->scalar('staff_email')
            ->maxLength('staff_email', 320)
            ->requirePresence('staff_email', 'create')
            ->notEmptyString('staff_email');

        $validator
            ->scalar('staff_password')
            ->maxLength('staff_password', 65)
            ->requirePresence('staff_password', 'create')
            ->notEmptyString('staff_password');

        return $validator;
    }
}
