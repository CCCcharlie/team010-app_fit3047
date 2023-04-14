<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Services Model
 *
 * @method \App\Model\Entity\Service newEmptyEntity()
 * @method \App\Model\Entity\Service newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Service[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Service get($primaryKey, $options = [])
 * @method \App\Model\Entity\Service findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Service patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Service[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Service|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Service saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ServicesTable extends Table
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

        $this->setTable('services');
        $this->setDisplayField('service_id');
        $this->setPrimaryKey('service_id');
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
            ->scalar('service_name')
            ->maxLength('service_name', 64)
            ->requirePresence('service_name', 'create')
            ->notEmptyString('service_name');

        $validator
            ->integer('service_duration')
            ->requirePresence('service_duration', 'create')
            ->notEmptyString('service_duration')
            //Assume that the highest possible duration for service is 999 minutes, use range to validate
            ->range('service_duration',  [0, 999],
                'Please enter a value between 0 and 999');

        $validator
            ->scalar('service_desc')
            ->maxLength('service_desc', 500)
            ->requirePresence('service_desc', 'create')
            ->notEmptyString('service_desc');

        $validator
            ->decimal('service_price')
            ->requirePresence('service_price', 'create')
            ->notEmptyString('service_price')
            //Assume that the highest possible cost is 99999$, use range to validate
            ->range('service_price',  [0, 99999],
            'Please enter a value between 0 and 99999');

        $validator
            //Validation for adding images in services
            //Add validation; image cannot be empty, and the file can only be jpg, png, jpeg.
            ->notEmptyFile('image_file')
            ->add( 'image_file', [
                'mimeType' => [
                    'rule' => [ 'mimeType', [ 'image/jpg', 'image/png', 'image/jpeg' ] ],
                    'message' => 'Please upload only jpg and png.',
                ],
            ] );

        $validator
            //Validation for editing image in services
            //Add validation; image cannot be empty, and the file can only be jpg, png, jpeg.
            ->notEmptyFile('change_image')
            ->add( 'change_image', [
                'mimeType' => [
                    'rule' => [ 'mimeType', [ 'image/jpg', 'image/png', 'image/jpeg' ] ],
                    'message' => 'Please upload only jpg and png.',
                ],
            ] );

        return $validator;
    }
}
