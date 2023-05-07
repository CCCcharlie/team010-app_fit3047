<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Enquiry Controller
 *
 * @property \App\Model\Table\EnquiryTable $Enquiry
 * @method \App\Model\Entity\Enquiry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnquiryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $enquiry = $this->paginate($this->Enquiry);

        $this->set(compact('enquiry'));
    }

    /**
     * View method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enquiry = $this->Enquiry->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('enquiry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $enquiry = $this->Enquiry->newEmptyEntity();
        if ($this->request->is('post')) {
            $enquiry = $this->Enquiry->patchEntity($enquiry, $this->request->getData());
            if ($this->Enquiry->save($enquiry)) {
                // $this->Flash->success(__('The enquiry has been saved.')); - Causes issues.

                return $this->redirect(['action' => 'index']);
            }
            // $this->Flash->error(__('The enquiry could not be saved. Please, try again.')); - Commenting out because it's showing on pages it shouldn't. -Alex
        }
        $this->set(compact('enquiry'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enquiry = $this->Enquiry->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enquiry = $this->Enquiry->patchEntity($enquiry, $this->request->getData());
            if ($this->Enquiry->save($enquiry)) {
                $this->Flash->success(__('The enquiry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            // $this->Flash->error(__('The enquiry could not be saved. Please, try again.'));
            // Showing on pages it shouldn't. Commented out.
        }
        $this->set(compact('enquiry'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enquiry = $this->Enquiry->get($id);
        if ($this->Enquiry->delete($enquiry)) {
            $this->Flash->success(__('The enquiry has been deleted.'));
        } else {
            $this->Flash->error(__('The enquiry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function updateReplied($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $enquiry= $this->Enquiry->get($id);

        // Flip the replied field value (should be a boolean)
        $enquiry->replied = !$enquiry->replied;

        if ($this->Enquiry->save($enquiry)) {
            $this->Flash->success(__('The reply status of contact form has been updated.'));
        } else {
            $this->Flash->error(__('The contact form could not be updated. Please, try again.'));
        }

        // Instead of redirect to index page, redirect to where the user came from
        // Remember the function is being called from both index listing and view page sidebar
        return $this->redirect($this->referer());
    }

}
