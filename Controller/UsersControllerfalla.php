<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Mailer\Email;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
   
   public function index() 
    {	$users = $this->paginate($this->Users);

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
            'contain' => ['Administs', 'Teachers','Students']
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
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $rol = $user['role'];
$email = new Email('default');
$email->setFrom(['26jhonluna@gmail.com' => 'Colegio BP'])
    ->setTo('jlunaq@unsa.edu.pe')
    ->setSubject('Bienvenido')
    ->send('BIenvenido Ahora eres parte del Colegio');

              if($rol=='1'){
                    $stud = $this->Users->Administs->newEntity();
                    $array2 = array('user_id'=>intval($user['id']));
                    //$this->Flash->error($array2);
                    $stud= $this->Users->Administs->patchEntity($stud,$array2);
                    if( $this->Users->Administs->save($stud)){
                    $this->Flash->success('Administrador Guardado');
                    return $this->redirect(['action' => 'index']);
                    }
                } 
                if($rol=='2'){
                    $stud = $this->Users->Teachers->newEntity();
                    $array2 = array('user_id'=>intval($user['id']));
                    //$this->Flash->error($array2);
                    $stud= $this->Users->Teachers->patchEntity($stud,$array2);
                    if( $this->Users->Teachers->save($stud)){
                    $this->Flash->success('Teacher Guardado');
                    return $this->redirect(['action' => 'index']);
                    }
                }
                if($rol=='3'){
$stud = $this->Users->Estudents->newEntity();
                    $array2 = array('user_id'=>intval($user['id']));
                    //$this->Flash->error($array2);
                    $stud= $this->Users->Estudents->patchEntity($stud,$array2);
                    if( $this->Users->Estudent->save($stud)){
                    $this->Flash->success('Estudents Guardado');
                    return $this->redirect(['action' => 'index']);
                    }



                }else{
                    $this->Flash->error(__('NO SE CREO CORRECTAMENTE'));
                }
              //  return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

      //  if($this->request->is("post")){
       //     $captcha = $this->request->session()->read("captcha");
        //    if($captcha != $this->request->data['captcha']){
       //         $this->Flash->error("captcha incorrect");
       //     }else{

        //    }
      //  }

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
        $user = $this->Auth->identify();
        if ($user) {
            if($user['status']==true){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl(['action' => 'index']));
            }

            else{
                $this->Flash->error('Usuario bloqueado');
            }
        }
        else
        {
        $this->Flash->error('Your username or password is incorrect.');
        }
    }
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
//$this->loadComponent('cakeCaptcha.captcha',['captchaConfig'=>'UsersCaptcha']);

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

