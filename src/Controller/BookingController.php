<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Booking Controller
 *
 * @property \App\Model\Table\BookingTable $Booking
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookingController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $bookings = $this->Bookings->find()
            ->contain(['Customers', 'Staffs', 'Services'])
            ->select([
                'booking_id',
                'eventstart',
                'eventend',
                'cust_fname' => 'Customers.customer_fname',
                'cust_lname' => 'Customers.customer_lname',
                'staff_fname' => 'Staffs.staff_fname',
                'staff_lname' => 'Staffs.staff_lname',
                'service_name' => 'Services.service_name'
            ])
            ->toArray();

        $this->set('bookings', $bookings);
        $this->paginate = [
            'contain' => ['Customer', 'Staff', 'Services'],
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
            'contain' => ['Customer', 'Staff', 'Services'],
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
            $booking = $this->Booking->patchEntity($booking, $this->request->getData());
            if ($this->Booking->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $customer = $this->Booking->Customer->find('list', ['limit' => 200])->all();
        $staff = $this->Booking->Staff->find('list', ['limit' => 200])->all();
        $services = $this->Booking->Services->find('list', ['limit' => 200])->all();
        $this->set(compact('booking', 'customer', 'staff', 'services'));
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
        $customer = $this->Booking->Customer->find('list', ['limit' => 200])->all();
        $staff = $this->Booking->Staff->find('list', ['limit' => 200])->all();
        $services = $this->Booking->Services->find('list', ['limit' => 200])->all();
        $this->set(compact('booking', 'customer', 'staff', 'services'));
    }

    public function events() {
        $bookingsTable = $this->getTableLocator()->get('Bookings');
        $bookings = $bookingsTable->events();

        $json = json_encode($bookings);

        $this->response = $this->response->withType('application/json');
        $this->response->getBody()->write($json);

        return $this->response;
    }

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
}
