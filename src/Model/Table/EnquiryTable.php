<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Enquiry Model
 *
 * @method \App\Model\Entity\Enquiry newEmptyEntity()
 * @method \App\Model\Entity\Enquiry newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Enquiry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Enquiry get($primaryKey, $options = [])
 * @method \App\Model\Entity\Enquiry findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Enquiry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Enquiry[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Enquiry|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Enquiry saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Enquiry[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Enquiry[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Enquiry[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Enquiry[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EnquiryTable extends Table
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

        $this->setTable('enquiry');
        $this->setDisplayField('enquiry_id');
        $this->setPrimaryKey('enquiry_id');
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
            ->scalar('Name')
            ->requirePresence('Name', 'create')
            ->notEmptyString('Name')
            ->add('Name', [
                'validCharacters' => [
                    'rule' => ['custom', '/^[a-zA-Z]+(?:[-\'\s]{1}[a-zA-Z]+)*$/'],
                    'message' => 'Please enter a valid name. Names cannot have multiple "-", or apostrophes in a row. Names cannot have numbers. '
                ]
            ]);

        $validator
            ->scalar('Email')
            ->requirePresence('Email', 'create')
            ->notEmptyString('Email')
            ->add('Email', [
                'validEmail' => [
                    'rule' => 'email',
                    'message' => 'Please enter a valid email address'
                ],
                'emailContainsAt' => [
                    'rule' => ['custom', '/@/'],
                    'message' => 'Your e-mail must contain the @ symbol.'
                ]
            ]);

        $validator
            ->scalar('Phone')
            ->requirePresence('Phone', 'create')
            ->notEmptyString('Phone')
            ->add('Phone', [
                'validFormat' => [
                    'rule' => [
                        'custom', // Only allowing AUS Phone numbers because all personas are AUS Based.
                        '/^(0[1-9]\d{8}|13\d{4}|1300\d{6}|1800\d{6})$/'
                    ],
                    'message' => 'Please enter a valid Australian phone number'
                ]
            ]);
        $validator
            ->scalar('Message')
            ->maxLength('Message', 500)
            ->requirePresence('Message', 'create')
            ->notEmptyString('Message');

        //Added validator for replied
        $validator
            ->boolean('replied')
            ->notEmptyString('replied');

        return $validator;
    }
}
