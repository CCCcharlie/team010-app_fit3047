<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License


 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html

 * @property \App\Model\Table\EnquiryTable $Enquiry
 *  @property \App\Model\Table\BookingTable $Booking
 * @method \App\Model\Entity\Enquiry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])

 */
class PagesController extends AppController
{

    //IMPORTANT, for home() to work here you MUST alter the route.php
    //$builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);     This
    //$builder->connect('/', ['controller' => 'Pages', 'action' => 'home']);                To this

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['home']);
    }

    public function home() {
        $contentBlocks = $this->fetchTable('Cb');

//-booking enquiry
        parent::initialize();
        $this->loadModel('Enquiry');
        $enquiry = $this->Enquiry->newEmptyEntity();
        $this->set('enquiry', $enquiry);

        $this->loadModel('Booking');
        $Booking = $this->Booking->newEmptyEntity();
        $this->set('Booking', $Booking);

        if ($this->request->is('post')) {
            $enquiry = $this->Enquiry->patchEntity($enquiry, $this->request->getData());

            if ($this->Enquiry->save($enquiry)) {
                echo '<script>alert("The enquiry has been saved")</script>';

//                $this->Flash->success(__('The enquiry has been saved.'));
                echo '<script>setTimeout(function(){ window.location.href = "/"; }, 200);</script>'; // Wait for 0.2 seconds before redirecting
                exit; // Stop the execution of the current script

//               return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enquiry could not be saved. Please, try again.'));


        }
        $this->set(compact('enquiry'));
//booking

        if ($this->request->is('post')) {
            $Booking = $this->Booking->patchEntity($Booking, $this->request->getData());
            if ($this->Booking->save($Booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $customer = $this->Booking->Customer->find('list', ['limit' => 200])->all();
        $staff = $this->Booking->Staff->find('list', ['limit' => 200])->all();
        $services = $this->Booking->Services->find('list', ['limit' => 200])->all();
        $this->set(compact('Booking', 'customer', 'staff', 'services'));


        // Key-value pairs are much easier to use when retrieving content blocks
        // See https://book.cakephp.org/4/en/orm/retrieving-data-and-resultsets.html#finding-key-value-pairs
        $homePageContentBlocks = $contentBlocks
            ->find('list', [
                'keyField' => 'hint',
                'valueField' => 'content_value'
            ])
            ->toArray();

        $services = $this->fetchTable('Services')->find()->all();


        $this->set(compact('homePageContentBlocks', 'services'));











//        $services = $this->fetchTable('Services')->find()->all();
//
//        $this->set(compact('services'));
    }



    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

}
