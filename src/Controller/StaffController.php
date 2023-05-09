<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;
use Cake\Mailer\Mailer;
use Cake\Utility\Security;

/**
 * Staff Controller
 *
 * @property \App\Model\Table\StaffTable $Staff
 *
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StaffController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login','forgetpassword','resetpassword']);
    }
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Staff',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }
    // in src/Controller/UsersController.php
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Staff', 'action' => 'login']);
        }
    }

    public function index()
    {
        $staff = $this->paginate($this->Staff);

        $this->set(compact('staff'));
    }
    // To be Fixed, taken from Bill's CMS System


    public function forgetpassword() {
        if ($this->request->is('post')) {
            // Retrieve the user entity by provided email address
//            debug($this->request->getData('staff_email'));
//            exit;

//            $query = null;
//            if($this->request->getData('staff_email')){
//                $inputEmail = $this->request->getData('staff_email');
//                $this->$query = $this->Staff->find('all', [
//                    'conditions' => ['Staff.staff_email LIKE' => $inputEmail]
//                ]);
//            }
//            $staff = $this->$query;
//            debug($staff);

            $thisEmail = $this->request->getData('staff_email');

            $query = $this->Staff->find('all', array(
                'conditions' => array(
                    'Staff.staff_email' => $thisEmail
                )
            ));
            $staff = $query->first();

            if ($staff) {
                // Set nonce and expiry date
                $staff->nonce = Security::randomString(128);
                $staff->nonce_expiry = new FrozenTime('7 days');
                if ($this->Staff->save($staff)) {
                    // Now let's send the password reset email
                    $mailer = new Mailer('default');

                    // email basic config
                    $mailer
                        ->setEmailFormat('both')
                        ->setTo($staff->staff_email)
                        ->setSubject('Reset your account password');

                    // select email template
                    $mailer
                        ->viewBuilder()
                        ->setTemplate('reset_password');

                    // transfer required view variables to email template
                    $mailer
                        ->setViewVars([
                            'first_name' => $staff->staff_fname,
                            'last_name' => $staff->staff_lname,
                            'nonce' => $staff->nonce,
                            'email' => $staff->staff_email
                        ]);

                    //Send email
                    if (!$mailer->deliver()) {
                        // Just in case something goes wrong when sending emails
                        $this->Flash->error(__('We have encountered an issue when sending you emails. Please try again. '));
                        return $this->render();  // Skip the rest of the controller and render the view
                    }
                } else {
                    // Just in case something goes wrong when saving nonce and expiry
                    $this->Flash->error(__('We are having issue to reset your password. Please try again. '));
                    return $this->render();  // Skip the rest of the controller and render the view
                }
            }

            /*
             * **This is bit of a special design**
             * We don't tell the user if their account exists, or if the email has been sent,
             * because it may be used by someone with malicious intent. We only need to tell
             * the user that they'll get an email.
             */

            $this->Flash->success(__('Please check your inbox (or spam folder) for an email regarding how to reset your account password. '));
            return $this->redirect(['action' => 'login']);

        }
    }

    /**
     * Reset Password method
     *
     * @param string|null $nonce Reset password nonce
     * @return \Cake\Http\Response|null|void Redirects on successful password reset, renders view otherwise.
     */

    public function resetpassword($nonce = null) {
        $staff = $this->Staff->findByNonce($nonce)->first();

        // If nonce cannot find the user, or nonce is expired, prompt for re-reset password
        if (!$staff || $staff->nonce_expiry < FrozenTime::now()) {
            $this->Flash->error(__('Your link is invalid or expired. Please try again. '));
            return $this->redirect(['action' => 'forgetpassword']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            // Used a different validation set in Model/Table file to ensure both fields are filled
            $staff = $this->Staff->patchEntity($staff, $this->request->getData(), ['validate' => 'resetpassword']);
            // Also clear the nonce-related fields on successful password resets
            $staff->nonce = null;
            $staff->nonce_expiry = null;

            if ($this->Staff->save($staff)) {
                $this->Flash->success(__('Your password has been successfully reset. Please login with new password. '));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The password cannot be reset. Please try again.'));
        }

        $this->set(compact('staff'));
    }


    /**
     * View method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staff = $this->Staff->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('staff'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staff = $this->Staff->newEmptyEntity();
        if ($this->request->is('post')) {
            $staff = $this->Staff->patchEntity($staff, $this->request->getData());

            //Query to check if email is unique, no duplicate emails allowed
            $query = null;
            if($this->request->getData('staff_email')){
                $inputEmail = $this->request->getData('staff_email');
                $this->$query = $this->Staff->find('all', [
                    'conditions' => ['Staff.staff_email LIKE' => $inputEmail]
                ])
                ->toArray();
            }

            //If it's not empty (staff exists, then show custom error message
            if (!empty($this->$query)) {
                $this->Flash->error(__('Inputted Email already exists, staff could not be saved. Please, try again.'));

            } elseif ($this->Staff->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));
                return $this->redirect(['action' => 'index']);
            //Other errors are shown as this as default
            } else {
                $this->Flash->error(__('The staff could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('staff'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staff = $this->Staff->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staff = $this->Staff->patchEntity($staff, $this->request->getData());
            if ($this->Staff->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $this->set(compact('staff'));
    }



    /**
     * Change Password method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function changepassword($id = null) {
        $staff = $this->Staff->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // Used a different validation set in Model/Table file to ensure both fields are filled
            $user = $this->Staff->patchEntity($staff, $this->request->getData(), ['validate' => 'resetpassword']);
            if ($this->Staff->save($staff)) {
                $this->Flash->success(__('The staff password change has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The password change could not be saved. Please, try again.'));
        }
        $this->set(compact('staff'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staff = $this->Staff->get($id);
        if ($this->Staff->delete($staff)) {
            $this->Flash->success(__('The staff has been deleted.'));
        } else {
            $this->Flash->error(__('The staff could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
