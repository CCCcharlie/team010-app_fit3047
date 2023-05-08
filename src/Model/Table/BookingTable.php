<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Booking Model
 *
 * @property \App\Model\Table\CustomerTable&\Cake\ORM\Association\BelongsTo $Customer
 * @property \App\Model\Table\StaffTable&\Cake\ORM\Association\BelongsTo $Staff
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsTo $Services
 *
 * @method \App\Model\Entity\Booking newEmptyEntity()
 * @method \App\Model\Entity\Booking newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Booking[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Booking get($primaryKey, $options = [])
 * @method \App\Model\Entity\Booking findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Booking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Booking[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Booking|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Booking saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BookingTable extends Table
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

        $this->setTable('booking');
        $this->setDisplayField('booking_id');
        $this->setPrimaryKey('booking_id');


        $this->belongsTo('Staff', [
            'foreignKey' => 'staff_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
            'joinType' => 'INNER',
        ]);
    }
    // This has been made to try and get the data booked and saved to the DB
    public function createOrUpdateBooking($event) {
        $booking = $this->newEntity();

        $booking->Title = $event['title'];
        $booking->Start_Date = $event['start']->format('Y-m-d H:i:s');
        $booking->End_Date = $event['end']->format('Y-m-d H:i:s');
        $booking->Url = $event['url'];

        if (!empty($event['booking_id'])) {
            // Update existing booking
            $booking->booking_id = $event['booking_id'];
            $booking = $this->patchEntity($booking, $event);
        }

        $this->save($booking);
    }

    // This should read the data
//    public function events() {
//        $bookings = $this->find('all', [
//            'contain' => ['Customer', 'Staff', 'Services'],
//            'fields' => [
//                'booking_id', 'eventstart', 'eventend',
//                'customer_fname', 'customer_lname',
//                'staff_fname', 'staff_lname',
//                'service_name'
//            ]
//        ])->map(function ($booking) {
//            $title = $booking['service_name'] . ' - Cust: ' . $booking['customer_fname'] . ' ' . $booking['customer_lname'] . ', ' . $booking['staff_fname'] . ' ' . $booking['staff_lname'];
//            return [
//                'id' => $booking['booking_id'],
//                'title' => $title,
//                'start' => $booking['eventstart']->toIso8601String(),
//                'end' => $booking['eventend']->toIso8601String()
//            ];
//        })->toArray();
//        return $bookings;
//    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->date('booking_date')
            ->requirePresence('booking_date', 'create')
            ->notEmptyDate('booking_date');

        $validator
            ->time('booking_time')
            ->requirePresence('booking_time', 'create')
            ->notEmptyTime('booking_time');

        $validator
            ->scalar('cust_email')
            ->notEmptyString('cust_email');

        $validator
            ->integer('staff_id')
            ->notEmptyString('staff_id');

        $validator
            ->integer('service_id')
            ->notEmptyString('service_id');

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
//        $rules->add($rules->existsIn('cust_email', 'Customer'), ['errorField' => 'cust_email']);
        $rules->add($rules->existsIn('staff_id', 'Staff'), ['errorField' => 'staff_id']);
        $rules->add($rules->existsIn('service_id', 'Services'), ['errorField' => 'service_id']);

        return $rules;
    }
}
