<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Services Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $services = $this->paginate($this->Services);

        $this->set(compact('services'));
    }


    public function admindex()
    {

        $this->loadComponent('Paginator');
        $services = $this->paginate($this->Services);

        $this->set(compact('services'));
    }

    /**
     * View method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $service = $this->Services->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('service'));
    }
    public function NavBarHider() {
        $this->set('hideNavBar', true);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $service = $this->Services->newEmptyEntity();
        if ($this->request->is('post')) {
            $service = $this->Services->patchEntity($service, $this->request->getData());

            //File upload documentation: https://www.youtube.com/redirect?event=video_description&redir_token=QUFFLUhqbWNNbmRGbC04NzZScDMtX0tCMnJZZFhPdnpZZ3xBQ3Jtc0tsQmRjbWhZdUI2NzhFVXEtbTFJVGJ6Z2xSU05PM1pkN29XWE4xRVBTUWFWVjEwSVdPRW4wbHR6c09HUW43aG5Tb2k2MzBTcEtyQTZTeVAtUVd1R1JKTGlYcGE3cnhaWXU2REFEOU9QX0hUNmEwZWRMZw&q=https%3A%2F%2Fbook.cakephp.org%2F4%2Fen%2Fcontrollers%2Frequest-response.html%23file-uploads&v=qgt1ALhWMeA

            //FOR VALIDATION, GO TO ServiceTable.PHP

            //if no error, run this
            if (!$service->getErrors()) {
                //This line gets data (image) with name of 'image_file' (from services' add.php)
                $image = $this->request->getData('image_file');

                //If we were to type
                //  debug($image);
                //  exit;
                // $image will contain the data for the image itself such as clientFilename, MediaType, file, size, etc)

                //Say I want to get the name fo the file. Simple,
                $image_name = $image->getClientFilename();

                //To make storing images easier, create a folder user-img where it is all stored there
                if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img')) {
                    mkdir(WWW_ROOT . 'img' . DS . 'user-img');
                }

                //Since the file needs to be also stored in the webroot directory, we can move the image to it

                //first define the path of webroot [WWW_ROOT is webroot, inside img folder,
                //add a [Directory Separator i.e, backslash], the name
                $targetPath = WWW_ROOT. 'img'.DS.'user-img'.DS.$image_name;
                //then move it
                if($image_name) {
                    $image->moveTo($targetPath);
                }
                //then, send the image to services' attribute, "image_name" including the path name so it can render properly.
                $service->image_name = 'user-img/' . $image_name;
            }


            if ($this->Services->save($service)) {
                $this->Flash->success(__('The service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service could not be saved. Please, try again.'));
        }
        $this->set(compact('service'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $service = $this->Services->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $service = $this->Services->patchEntity($service, $this->request->getData());
            //First check if theres errors or not
            if (!$service->getErrors()) {
                //Gets from field name of edit.php of services
                $image = $this->request->getData('change_image');

                //get image name
                $image_name = $image->getClientFilename();
                //if it exists, do all of this
                if ($image_name) {
                    //if a directory was not made already, create one
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img')) {
                        mkdir(WWW_ROOT . 'img' . DS . 'user-img');
                    }
                    //Set target path to webroot/img/user-img/name_of_image
                    $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $image_name;

                    //Move the image obtained from the form, to the path defined above
                    $image->moveTo($targetPath);

                    //Similary to the add function here, store it in database the folder and the name of the image
                    $service->image_name = 'user-img/' . $image_name;
                }
            }

            if ($this->Services->save($service)) {
                $this->Flash->success(__('The service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
                $this->Flash->error(__('Unknown error!! Please try again'));
        }
        $this->set(compact('service'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $service = $this->Services->get($id);
        if ($this->Services->delete($service)) {
            $this->Flash->success(__('The service has been deleted.'));
        } else {
            $this->Flash->error(__('The service could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
