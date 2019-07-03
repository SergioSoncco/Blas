<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Grades Controller
 *
 * @property \App\Model\Table\GradesTable $Grades
 *
 * @method \App\Model\Entity\Grade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GradesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Subjects', 'Students']
        ];
        $grades = $this->paginate($this->Grades);

        $this->set(compact('grades'));
    }

    /**
     * View method
     *
     * @param string|null $id Grade id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $grade = $this->Grades->get($id, [
            'contain' => ['Subjects', 'Students']
        ]);

        $this->set('grade', $grade);
    }

    /**ge
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function gradestudent($as = null)
    {

        $asd = TableRegistry::getTableLocator()->get('Subjects')
        ->find()
        ->select(['level_id'])
        ->where(['teacher_id'=>($as)])
        ->first();

    //    $asd->enableHydration(false);
   //     $ss = $asd->toList();
      //  $lev = $this->Levels->get(id);

    /*    $mm = TableRegistry::getTableLocator()->get('Levels')
        ->find()
        ->select(['level_id'])
        ->where(['level_id'=>($asd)])*(***)
        ->first();*/

        $quer = TableRegistry::getTableLocator()->get('Students')
        ->find()
        ->where(['level'=>$asd['level_id']]);
    //    ->first();

     //   $this->Flash->success($asd);
     //   $this->Flash->success($quer);
        

        // $sub->where(['teacher_id'=> $as]);
        //() $qq['id'];//$sa = $grade['id'];
        // $grades = TableRegistry::getTableLocator()->get('Users');
        // $quer = $grades->find();
        // $quer->where(['subject_id'=>$quer]);
       //  $students = TableRegistry::getTableLocator()->get('Students');
        // $query = $students->find();

        // $query->where(['id'=>$quer->student_id]);
         $this->set(compact('quer'));
         
    }

    public function add($si=null,$mi =null)
    {
        $grade = $this->Grades->newEntity();
        if ($this->request->is('post')) {
            $nota1 = $this->request->getData('grade_1');
            $nota2 = $this->request->getData('grade_2');
            $nota3 = $this->request->getData('grade_3');
            $a = ceil(($nota1+$nota2+$nota3)/3);
            $prom = ceil($a);

            if(($prom-$a)> 0.5){
                $prom = ceil($a)-1; 
            }


            $array = array(
                'subject_id'=>$si,
                'student_id'=>$mi,
                'grade_1'=>$this->request->getData('grade_1'),
                'grade_2'=>$this->request->getData('grade_2'),
                'grade_3'=>$this->request->getData('grade_3'),
                'average'=>intval($prom)
            );

            $grade = $this->Grades->patchEntity($grade,$array);
            if ($this->Grades->save($grade)) {
                $this->Flash->success(__('The grade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('The grade could not be saved. Please, try again.'));
            $this->Flash->error($prom);
        }
        $subjects = $this->Grades->Subjects->find('list', ['limit' => 200]);
        $students = $this->Grades->Students->find('list', ['limit' => 200]);
        $this->set(compact('grade', 'subjects', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Grade id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $grade = $this->Grades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grade = $this->Grades->patchEntity($grade, $this->request->getData());
            if ($this->Grades->save($grade)) {
                $this->Flash->success(__('The grade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grade could not be saved. Please, try again.'));
        }
        $subjects = $this->Grades->Subjects->find('list', ['limit' => 200]);
        $students = $this->Grades->Students->find('list', ['limit' => 200]);
        $this->set(compact('grade', 'subjects', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Grade id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $grade = $this->Grades->get($id);
        if ($this->Grades->delete($grade)) {
            $this->Flash->success(__('The grade has been deleted.'));
        } else {
            $this->Flash->error(__('The grade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
    if(isset($user['role'])&& ($user['role'] == 2 || $user['role'] == 1) ){
    return true;
}
    return false;
    }
}
