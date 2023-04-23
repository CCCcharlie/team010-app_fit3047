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
        $cb = $this->paginate($this->Cb, ['limit' => 10]);

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
                $this->Flash->success(__('The website edit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('There was an issue with the website edit. Please, try again.'));
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

            //IMPORTANT: updates the content of previous_value to the content of the current value before the change is made.
            //Basically acts as storing the previous value of content value
            $cb->previous_value = $cb->content_value;
//            debug($cb);
//            exit();
            //First check if theres errors or not and if image, we dont want to do stuff if its text lmao
            if (!$cb->getErrors() && $cb->content_type == "image") {
                //Gets from field name of edit.php of services
                $image = $this->request->getData('content_image');

//                debug($image);
//                exit();

                //get image name
                $image_name = $image->getClientFilename();
                //if it exists, do all of this
                if ($image_name) {
                    //if a directory was not made already, create one
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'gallery')) {
                        mkdir(WWW_ROOT . 'img' . DS . 'gallery');
                    }
                    //Set target path to webroot/img/user-img/name_of_image
                    $targetPath = WWW_ROOT . 'img' . DS . 'gallery' . DS . $image_name;

                    //Move the image obtained from the form, to the path defined above
                    $image->moveTo($targetPath);

                    //Similary to the add function here, store it in database the folder and the name of the image
                    $cb->content_value =  $image_name;
                }
            }
            //save if there are no errors
            if ($this->Cb->save($cb)) {
                $this->Flash->success(__('Your changes have been saved.'));

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
