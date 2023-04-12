<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Expertise Model
 *
 * @property \App\Model\Table\StaffTable&\Cake\ORM\Association\BelongsToMany $Staff
 *
 * @method \App\Model\Entity\Expertise newEmptyEntity()
 * @method \App\Model\Entity\Expertise newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Expertise[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Expertise get($primaryKey, $options = [])
 * @method \App\Model\Entity\Expertise findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Expertise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Expertise[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Expertise|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Expertise saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Expertise[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Expertise[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Expertise[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Expertise[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ExpertiseTable extends Table
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

        $this->setTable('expertise');
        $this->setDisplayField('expertise_title');
        $this->setPrimaryKey('expertise_title');

        $this->belongsToMany('Staff', [
            'foreignKey' => 'expertise_id',
            'targetForeignKey' => 'staff_id',
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
            ->scalar('expertise_desc')
            ->maxLength('expertise_desc', 500)
            ->requirePresence('expertise_desc', 'create')
            ->notEmptyString('expertise_desc');

        return $validator;
    }
}
