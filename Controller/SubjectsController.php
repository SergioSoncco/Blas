<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Subjects Controller
 *
 * @property \App\Model\Table\SubjectsTable $Subjects
 *
 * @method \App\Model\Entity\Subject[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubjectsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Levels', 'Teachers']
        ];
        $subjects = $this->paginate($this->Subjects);

        $this->set(compact('subjects'));
    }

    /**
     * View method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subject = $this->Subjects->get($id, [
            'contain' => ['Levels', 'Teachers']
        ]);

        $this->set('subject', $subject);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subject = $this->Subjects->newEntity();
        if ($this->request->is('post')) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->getData());
            if ($this->Subjects->save($subject)) {
               $this->Flash->success(__('The subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subject could not be saved. Please, try again.'));
           // $this->Flash->error($subject);
        }
        $levels = $this->Subjects->Levels->find('list', ['limit' => 200]);
    //    $teachers = $this->Subjects->Teachers->find('list', ['limit' => 200]);

        
         $teachers = TableRegistry::getTableLocator()->get('Teachers')->find('list', array(
        'fields' => array('id') ))
         ->order(['id' => 'DESC']);
       // 'conditions' => array('status !=' => '0')));
   //      ->where(['user_id'=>2]);
     // $teachers = TableRegistry::getTableLocator()->get('Users')
     //   ->find('list', array(
     //   'fields' => array('username'),
    //    'conditions' => array('status !=' => '0')))
   //     ->select(['names'])
   //     ->where(['role'=>2]);
     //   ->first();
     //    $teachers = TableRegistry::getTableLocator()->get('Teachers')->find('list', array(
    //    'fields' => array('id'),
    //    'conditions' => array('status !=' => '0')))
   //      ->where(['role'=>2]);
        
    //    $this->Flash->error($teachers);
        $this->set(compact('subject', 'levels', 'teachers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subject = $this->Subjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->getData());
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('The subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subject could not be saved. Please, try again.'));
        }
        $levels = $this->Subjects->Levels->find('list', ['limit' => 200]);
        $teachers = $this->Subjects->Teachers->find('list', ['limit' => 200]);
        $this->set(compact('subject', 'levels', 'teachers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subject = $this->Subjects->get($id);
        if ($this->Subjects->delete($subject)) {
            $this->Flash->success(__('The subject has been deleted.'));
        } else {
            $this->Flash->error(__('The subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
	if(isset($user['role'])&& $user['role'] == 1  ){
	return true;
}
    return false;
    }
}
