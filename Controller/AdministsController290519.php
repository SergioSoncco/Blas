<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Administs Controller
 *
 * @property \App\Model\Table\AdministsTable $Administs
 *
 * @method \App\Model\Entity\Administ[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdministsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */


    public function index(){
        $administs = $this->paginate($this->Administs);

        $this->set(compact('administs'));

         }
    




    /**
     * View method
     *
     * @param string|null $id Administ id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $administ = $this->Administs->get($id, [
            'contain' => []
        ]);

        $this->set('administ', $administ);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $administ = $this->Administs->newEntity();
        if ($this->request->is('post')) {
            $administ = $this->Administs->patchEntity($administ, $this->request->getData());
            if ($this->Administs->save($administ)) {
                $this->Flash->success(__('The administ has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The administ could not be saved. Please, try again.'));
        }
        $this->set(compact('administ'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Administ id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $administ = $this->Administs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $administ = $this->Administs->patchEntity($administ, $this->request->getData());
            if ($this->Administs->save($administ)) {
                $this->Flash->success(__('The administ has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The administ could not be saved. Please, try again.'));
        }
        $this->set(compact('administ'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Administ id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $administ = $this->Administs->get($id);
        if ($this->Administs->delete($administ)) {
            $this->Flash->success(__('The administ has been deleted.'));
        } else {
            $this->Flash->error(__('The administ could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user){
        return true;
    }
}
