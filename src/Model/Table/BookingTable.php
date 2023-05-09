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
            ->dateTime('eventstart')
            ->requirePresence('eventstart', 'create')
            ->notEmptyDateTime('eventstart');
        $validator
            ->integer('staff_id')
            ->notEmptyString('staff_id');

        $validator
            ->integer('service_id')
            ->notEmptyString('service_id');

        $validator
            ->scalar('cust_fname')
            ->maxLength('cust_fname', 64)
            ->requirePresence('cust_fname', 'create')
            ->notEmptyString('cust_fname')
            ->add('cust_fname', [
                'noDelimiters' => [
                    'rule' => ['custom', '/^[^--;]+$/'],
                    'message' => 'Your input contains invalid characters.'
                ]
            ]);

        $validator
            ->scalar('cust_lname')
            ->maxLength('cust_lname', 64)
            ->requirePresence('cust_lname', 'create')
            ->notEmptyString('cust_lname')
            ->add('cust_lname', [
                'noDelimiters' => [
                    'rule' => ['custom', '/^[^--;]+$/'],
                    'message' => 'Your input contains invalid characters.'
                ]
            ]);

        $validator
            ->integer('cust_phone')
            ->maxLength('cust_phone', 10)
            ->requirePresence('cust_phone', 'create')
            ->notEmptyString('cust_phone')
            ->add('cust_phone', [
                'validFormat' => [
                    'rule' => [
                        'custom', // Only allowing AUS Phone numbers because all personas are AUS Based.
                        '/^(0[1-9]\d{8}|13\d{4}|1300\d{6}|1800\d{6})$/'
                    ],
                    'message' => 'Please enter a valid Australian phone number'
                ],
                'noDelimiters' => [
                    'rule' => ['custom', '/^[^--;]+$/'],
                    'message' => 'Your input contains invalid characters.'
                ]
            ]);
        $validator
            ->scalar('cust_email')
            ->maxLength('cust_email', 320)
            ->requirePresence('cust_email', 'create')
            ->notEmptyString('cust_email')
            ->add('cust_email', [
                'emailContainsAt' => [
                    'rule' => ['custom', '/@/'],
                    'message' => 'Your e-mail must contain the @ symbol.'
                ],
                'noDelimiters' => [
                    'rule' => ['custom', '/^[^--;]+$/'],
                    'message' => 'Your input contains invalid characters.'
                ]
            ]);

        // This, probably won't work. I don't know enough of CakePHP D:
        $validator
            ->add('eventstart', 'valid', [
                'rule' => 'datetime',
                'message' => 'Please enter a valid date and time'
            ]);
//            ->add('eventstart', 'checkBookingTime', [
//                'rule' => 'validateBookingTime',
//                'message' => 'This staff member is already booked during this time frame'
//            ]);

        return $validator;
}

// For anyone reading this, it's abit of a hail mary. But see what I can do. - Alex.
    public function validateBookingTime($value, $context)
    {
        $booking = $this->newEntity($context['data']);
        $booking->set('eventend', date('Y-m-d H:i:s', strtotime($booking->eventstart . ' + ' . $booking->service->service_duration . ' minutes')));

        $existingBooking = $this->find()
            ->where([
                'staff_id' => $booking->staff_id,
                'eventstart <=' => $booking->eventend,
                'eventend >=' => $booking->eventstart,
            ])
            ->first();

        return empty($existingBooking);
    }
    /**
     *Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('staff_id', 'Staff'), ['errorField' => 'staff_id']);
        $rules->add($rules->existsIn('service_id', 'Services'), ['errorField' => 'service_id']);

        return $rules;
    }
}
