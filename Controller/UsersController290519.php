<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function captcha(){
    $this->render(false);

    $string = substring(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",5)),0,5);

    $this->request->session()->write("captcha",$string);

    
    $font == WWW_ROOT.'fonts'.DS.'FreeSerif.ttf';

    $img =imagecreate(120,30);

    $white = imagecolorallocate($img,255,255,255);

    $background =imagecolorallocate($img,213,31,49);

    imagefilledrectangle($img,0,0,120,30,$background);

    imagettftext($img,20,0,10,10,23,$white,$font,$string);

    imageline($img,0,0,90,25,$white);

    imageline($img,0,30,60,0,$white);

    imagepng($img);
    $this->response->type("image/png");
    imagedestroy($img);
}







    public function index() 
    {


	$users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        /*$user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));*/
        if($this->request->is("post")){
            $captcha = $this->request->session()->read("captcha");
            if($captcha != $this->request->data['captcha']){
                $this->Flash->error("captcha incorrect");
            }else{

            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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

    public function login()
    {
        if ($this->request->is('post')) {
            //$isHuman = captcha_validate($this->request->data['CaptchaCode']); 

      // clear previous user input, since each Captcha code can only be validated once 
      //unset($this->request->data['CaptchaCode']);

	    $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }      
        $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);

  //	$this-> loadComponent ( 'CakeCaptcha.Captcha' , [  
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

