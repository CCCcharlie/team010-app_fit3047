<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Staffexpertise Controller
 *
 * @property \App\Model\Table\StaffexpertiseTable $Staffexpertise
 * @method \App\Model\Entity\Staffexpertise[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StaffexpertiseController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Staff'],
        ];
        $staffexpertise = $this->paginate($this->Staffexpertise);

        $this->set(compact('staffexpertise'));
    }

    /**
     * View method
     *
     * @param string|null $id Staffexpertise id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staffexpertise = $this->Staffexpertise->get($id, [
            'contain' => ['Staff'],
        ]);

        $this->set(compact('staffexpertise'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staffexpertise = $this->Staffexpertise->newEmptyEntity();
        if ($this->request->is('post')) {
            $staffexpertise = $this->Staffexpertise->patchEntity($staffexpertise, $this->request->getData());
            if ($this->Staffexpertise->save($staffexpertise)) {
                $this->Flash->success(__('The staffexpertise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staffexpertise could not be saved. Please, try again.'));
        }
        $staff = $this->Staffexpertise->Staff->find('list', ['limit' => 200])->all();
        $this->set(compact('staffexpertise', 'staff'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Staffexpertise id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staffexpertise = $this->Staffexpertise->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staffexpertise = $this->Staffexpertise->patchEntity($staffexpertise, $this->request->getData());
            if ($this->Staffexpertise->save($staffexpertise)) {
                $this->Flash->success(__('The staffexpertise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staffexpertise could not be saved. Please, try again.'));
        }
        $staff = $this->Staffexpertise->Staff->find('list', ['limit' => 200])->all();
        $this->set(compact('staffexpertise', 'staff'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Staffexpertise id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staffexpertise = $this->Staffexpertise->get($id);
        if ($this->Staffexpertise->delete($staffexpertise)) {
            $this->Flash->success(__('The staffexpertise has been deleted.'));
        } else {
            $this->Flash->error(__('The staffexpertise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
