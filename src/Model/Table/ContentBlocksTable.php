<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContentBlocks Model
 *
 * @method \App\Model\Entity\ContentBlock newEmptyEntity()
 * @method \App\Model\Entity\ContentBlock newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ContentBlock[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContentBlock get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContentBlock findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ContentBlock patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContentBlock[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContentBlock|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContentBlock saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContentBlock[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContentBlock[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContentBlock[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContentBlock[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ContentBlocksTable extends Table
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

        $this->setTable('content_blocks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('hint')
            ->maxLength('hint', 50)
            ->requirePresence('hint', 'create')
            ->notEmptyString('hint');

        $validator
            ->scalar('content_type')
            ->maxLength('content_type', 10)
            ->requirePresence('content_type', 'create')
            ->notEmptyString('content_type');

        $validator
            ->scalar('content_value')
            ->maxLength('content_value', 700)
            ->requirePresence('content_value', 'create')
            ->notEmptyString('content_value');

        $validator
            ->scalar('previous_value')
            ->maxLength('previous_value', 700)
            ->allowEmptyString('previous_value');

        return $validator;
    }
}
