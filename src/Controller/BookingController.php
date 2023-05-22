<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Booking Controller
 *
 * @property \App\Model\Table\BookingTable $Booking
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])

 */
use Cake\Routing\Router;
use Cake\Validation\Validation;
class BookingController extends AppController
{


    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');



        //bookingvar passing


        $booked_time=$this->Booking->find('list',[
            'keyField'=>'id',
            'valueField'=>function($booking){


                return$booking->eventstart;

            }

        ])->toArray();



        $toJson=json_encode($booked_time);
//$toJson=$booked_time;

        $this->set(compact('toJson'));

    }




    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['add', 'confirm']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Staff', 'Services'],
        ];
        $booking = $this->paginate($this->Booking);




        $this->set(compact('booking'));
    }


    public function calendar()
    {
        $this->paginate = [
            'contain' => ['Staff', 'Services'],
        ];
        $booking = $this->paginate($this->Booking);




        $this->set(compact('booking'));
    }


    /**
     * View method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booking = $this->Booking->get($id, [
            'contain' => ['Staff', 'Services'],
        ]);

        $this->set(compact('booking'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $booking = $this->Booking->newEmptyEntity();
        if ($this->request->is('post')) {
            $booking = $this->Booking->patchEntity($booking, $this->request->getData(), [
            ]);
            if ($this->Booking->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

//                debug($booking);
//                exit();
                return $this->redirect(['action' => 'confirm', $booking->booking_id]);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $staff = $this->Booking->Staff->find('list', [
            'limit' => 200,
            'valueField' => 'full_name'
        ])->all();
        $services = $this->Booking->Services->find('list', [
        'limit' => 200,
        'valueField' => 'full_name'
        ])->all();
        $this->set(compact('booking', 'staff', 'services'));




    }

    /**
     * Edit method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $booking = $this->Booking->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Booking->patchEntity($booking, $this->request->getData());
            if ($this->Booking->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $staff = $this->Booking->Staff->find('list', [
            'limit' => 200,
            'valueField' => 'full_name'
        ])->all();
        $services = $this->Booking->Services->find('list', [
            'limit' => 200,
            'valueField' => 'full_name'
        ])->all();


        $this->set(compact('booking', 'staff', 'services'));

    }

//    public function events() {
//        $bookingsTable = $this->getTableLocator()->get('booking');
//        $bookings = $bookingsTable->events();
//
//        $json = json_encode($bookings);
//
//        $this->response = $this->response->withType('application/json');
//        $this->response->getBody()->write($json);
//
//        return $this->response;
//    }

    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Booking->get($id);
        if ($this->Booking->delete($booking)) {
            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



    public function confirm($id = null)
    {
        $booking = $this->Booking->get($id, [
            'contain' => ['Staff', 'Services'],
        ]);

        $this->set(compact('booking'));
    }


}


