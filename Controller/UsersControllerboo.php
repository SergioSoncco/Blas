<?php namespace App\Controller; 

use App\Controller\AppController; 
use Cake\Event\Event; 

class UsersController extends AppController 
{ 
  public function beforeFilter(Event $event) 
  { 
    parent::beforeFilter($event); 

    $this->viewBuilder()->layout('auth'); 

    // Allow users to register and logout. 
    $this->Auth->allow(['register', 'logout']); 
  } 

  public function login() 
  { 

    // load the Captcha component and set its parameter 
    $this->loadComponent('CakeCaptcha.Captcha', [ 
      'captchaConfig' => 'LoginCaptcha' 
    ]); 

    if ($this->request->is('post')) { 

      // validate the user-entered Captcha code 
      $isHuman = captcha_validate($this->request->data['CaptchaCode']); 

      // clear previous user input, since each Captcha code can only be validated once 
      unset($this->request->data['CaptchaCode']); 
      
      if ($isHuman) { 
        $user = $this->Auth->identify(); 
        if ($user) { 
          $this->Auth->setUser($user); 
          return $this->redirect($this->Auth->redirectUrl()); 
        } 
        $this->Flash->error(__('Invalid username or password, try again')); 
      } else { 
        $this->Flash->error(__('CAPTCHA validation failed, try again.')); 
      } 
    } 
    $this->set('user', $user);
  } 

  public function register() 
  { 
    // load the Captcha component and set its parameter 
    $this->loadComponent('CakeCaptcha.Captcha', [ 
      'captchaConfig' => 'RegisterCaptcha' 
    ]); 

    $user = $this->Users->newEntity(); 
    if ($this->request->is('post')) { 

      // validate the user-entered Captcha code 
      $isHuman = captcha_validate($this->request->data['CaptchaCode']); 

      // clear previous user input, since each Captcha code can only be validated once 
      unset($this->request->data['CaptchaCode']); 
 
      if ($isHuman) { 
        $query = $this->Users->findAllByUsernameOrEmail($this->request->data['username'], $this->request->data['email']); 
        if ($query->count() == 0) { 
          $user = $this->Users->patchEntity($user, $this->request->data); 
          if ($this->Users->save($user)) { 
            $this->Flash->success(__('The user has been saved.')); 
            return $this->redirect(['action' => 'register']); 
          } 
          $this->Flash->error(__('Unable to add the user.')); 
        } else { 
          $this->Flash->error(__('This user already exists.')); 
        } 
      } else { 
        $this->Flash->error(__('CAPTCHA validation failed, try again.')); 
      } 
        
    } 
    $this->set('user', $user); 
  } 

 
  public function index() {
    $users = $this->paginate($this->Users);

        $this->set(compact('users'));
  } 

  public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
     public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
     public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);

  //  $this-> loadComponent ( 'CakeCaptcha.Captcha' , [  
  //      'captchaConfig' => 'UsersCaptcha'  
  //    ]);
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function isAuthorized($user)
    {

    return true;
    }
} 