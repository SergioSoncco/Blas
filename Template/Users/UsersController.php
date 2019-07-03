<?php
namespace App\Controller;
use Cake\Mailer\Email;

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
   public function index() 
    {	

    }

       public function list() 
    {   $users = $this->paginate($this->Users);

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
public function add(){
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $rol = $user['role'];

/*$email = new Email('default');
$email->setFrom(['qjhoson@gmail.com' => 'Jhon Colegio'])
    ->setTo('caminorealfc26@gmail.com')
    ->setSubject('Bvenido')
    ->send('En hora buena, usted ya forma parte de Blas Pascal');
*/
$email = new Email('default');
$email
->setTo($user->email)
->setProfile('default')
->setEmailFormat('html')
->setSubject('Bienvenido');

              if($rol=='1'){
                    $stud = $this->Users->Administs->newEntity();
                    $array2 = array('user_id'=>intval($user['id']));
                    //$this->Flash->error($array2);
                    $stud= $this->Users->Administs->patchEntity($stud,$array2);
                    if( $this->Users->Administs->save($stud)){
                    $this->Flash->success('Administrador saved');
                    return $this->redirect(['action' => 'index']);
                    }
                } 
                if($rol=='2'){
                    $stud = $this->Users->Teachers->newEntity();
                    $array2 = array('user_id'=>intval($user['id']));
                    //$this->Flash->error($array2);
                    $stud= $this->Users->Teachers->patchEntity($stud,$array2);
                    if( $this->Users->Teachers->save($stud)){
                    $this->Flash->success('Teacher Saved');
                    return $this->redirect(['action' => 'index']);
                    }
                }
                if($rol=='3'){
                   
                    return $this->redirect(['action' => 'addstd']);
                
            }

            else{
                    $this->Flash->error(__('NO SE CREO CORRECTAMENTE'));
                }
              //  return $this->redirect(['action' => 'index']);
           
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function addstd(){
        $student = $this->Users->Students->newEntity();
        if ($this->request->is('post')) {
            $student = $this->Users->Students->patchEntity($student, $this->request->getData());

         /*  $array = array(
                'user_id'=>$a,
                'level'=>$this->request->getData('level')
            );
            $student = $this->Users->Students->patchEntity($student, $array);
            if ($this->Users->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error($student);
        }*/
        $users = $this->Users->find('list', ['limit' => 200]);
       // $levels = $this->Levels->find('list', ['limit' => 200]);
        $this->set(compact('student','users','levels'));

    }
    /*
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
      public function edit($id = null){
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
$email = new Email('default');
$email
->setTo($user->email)
->setProfile('default')
->setEmailFormat('html')
->setSubject('Usuario Bloqueado');

        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
//llamar el captcha
//	requier_once('recaptchalib.php');
//	$privatekey="6Lc4XKcUAAAAAIwGstizU3C9UCC2IMALQza6RNIF";
//	$resp=recaptcha_check_answer($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);
//	if(!$resp->is_valid){
//	die("El captcha no fue llenado correctamente"."(reCAPTCHA said:".$resp->error.")");
//}
//else{
        if ($this->request->is('post') ) {
        $user = $this->Auth->identify();
	//$isHuman = captcha_validate($this->request->data['CaptchaCode']);
	//$this->Flash->succes($isHuman);
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
//solo aumentar or captcha
        $this->Flash->error('Your username or password is incorrect.');
        }
    }
//}
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);


    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function isAuthorized($user)
    {
	if (isset($user['role']) && $user['role'] == 1) {
        return true;
	}
	if($this->request->getParam('action') === 'index' ){
	return true;
}
    // Default deny
    return false;
    }
}

