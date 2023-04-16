<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cb Controller
 *
 * @property \App\Model\Table\CbTable $Cb
 * @method \App\Model\Entity\Cb[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CbController extends AppController
{
    //initialise so content_types can be accessed by index, edit, add.
    public function initialize(): void {
        parent::initialize();
        // Define types of contents in view
        $this->set('content_types', [
            'text' => 'text',
            'image' => 'Image',
        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cb = $this->paginate($this->Cb);

        $this->set(compact('cb'));
    }

    /**
     * View method
     *
     * @param string|null $id Cb id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cb = $this->Cb->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('cb'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cb = $this->Cb->newEmptyEntity();
        if ($this->request->is('post')) {
            $cb = $this->Cb->patchEntity($cb, $this->request->getData());
            if ($this->Cb->save($cb)) {
                $this->Flash->success(__('The cb has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cb could not be saved. Please, try again.'));
        }
        $this->set(compact('cb'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cb id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cb = $this->Cb->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cb = $this->Cb->patchEntity($cb, $this->request->getData());
            if ($this->Cb->save($cb)) {
                $this->Flash->success(__('The cb has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cb could not be saved. Please, try again.'));
        }
        $this->set(compact('cb'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cb id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cb = $this->Cb->get($id);
        if ($this->Cb->delete($cb)) {
            $this->Flash->success(__('The cb has been deleted.'));
        } else {
            $this->Flash->error(__('The cb could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
