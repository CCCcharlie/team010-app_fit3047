<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * StaffExpertise Controller
 *
 * @property \App\Model\Table\StaffExpertiseTable $StaffExpertise
 * @method \App\Model\Entity\StaffExpertise[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StaffExpertiseController extends AppController
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
        $staffExpertise = $this->paginate($this->StaffExpertise);

        $this->set(compact('staffExpertise'));
    }

    /**
     * View method
     *
     * @param string|null $id Staff Expertise id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staffExpertise = $this->StaffExpertise->get($id, [
            'contain' => ['Staff'],
        ]);

        $this->set(compact('staffExpertise'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staffExpertise = $this->StaffExpertise->newEmptyEntity();
        if ($this->request->is('post')) {
            $staffExpertise = $this->StaffExpertise->patchEntity($staffExpertise, $this->request->getData());
            if ($this->StaffExpertise->save($staffExpertise)) {
                $this->Flash->success(__('The staff expertise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff expertise could not be saved. Please, try again.'));
        }
        $staff = $this->StaffExpertise->Staff->find('list', ['limit' => 200])->all();
        $this->set(compact('staffExpertise', 'staff'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Staff Expertise id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staffExpertise = $this->StaffExpertise->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staffExpertise = $this->StaffExpertise->patchEntity($staffExpertise, $this->request->getData());
            if ($this->StaffExpertise->save($staffExpertise)) {
                $this->Flash->success(__('The staff expertise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff expertise could not be saved. Please, try again.'));
        }
        $staff = $this->StaffExpertise->Staff->find('list', ['limit' => 200])->all();
        $this->set(compact('staffExpertise', 'staff'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Staff Expertise id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staffExpertise = $this->StaffExpertise->get($id);
        if ($this->StaffExpertise->delete($staffExpertise)) {
            $this->Flash->success(__('The staff expertise has been deleted.'));
        } else {
            $this->Flash->error(__('The staff expertise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
