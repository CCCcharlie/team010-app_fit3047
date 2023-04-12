<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Expertise Controller
 *
 * @property \App\Model\Table\ExpertiseTable $Expertise
 * @method \App\Model\Entity\Expertise[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExpertiseController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $expertise = $this->paginate($this->Expertise);

        $this->set(compact('expertise'));
    }

    /**
     * View method
     *
     * @param string|null $id Expertise id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expertise = $this->Expertise->get($id, [
            'contain' => ['Staff'],
        ]);

        $this->set(compact('expertise'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expertise = $this->Expertise->newEmptyEntity();
        if ($this->request->is('post')) {
            $expertise = $this->Expertise->patchEntity($expertise, $this->request->getData());
            if ($this->Expertise->save($expertise)) {
                $this->Flash->success(__('The expertise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expertise could not be saved. Please, try again.'));
        }
        $staff = $this->Expertise->Staff->find('list', ['limit' => 200])->all();
        $this->set(compact('expertise', 'staff'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Expertise id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expertise = $this->Expertise->get($id, [
            'contain' => ['Staff'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expertise = $this->Expertise->patchEntity($expertise, $this->request->getData());
            if ($this->Expertise->save($expertise)) {
                $this->Flash->success(__('The expertise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expertise could not be saved. Please, try again.'));
        }
        $staff = $this->Expertise->Staff->find('list', ['limit' => 200])->all();
        $this->set(compact('expertise', 'staff'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Expertise id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expertise = $this->Expertise->get($id);
        if ($this->Expertise->delete($expertise)) {
            $this->Flash->success(__('The expertise has been deleted.'));
        } else {
            $this->Flash->error(__('The expertise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
