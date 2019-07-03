
<?php
use Cake\ORM\TableRegistry;
use Cake\ORM\Collection;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */


?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">

        <li class="heading"><?= __('Actions') ?></li>
        <?php
            if( $this->request->getSession()->read('Auth.User'))
           {
                $a = $this->getRequest()->getSession()->read('Auth.User.role');
                $b = $this->getRequest()->getSession()->read('Auth.User.id');;
                if($a==1){
                    echo $this->Html->link('<li>'.__('Add User').'</li>', ['controller' => 'Users', 'action' => 'add'],array('class'=>'li','escape' => false));

                    echo $this->Html->link('<li>'.__('List Users').'</li>', ['controller' => 'Users', 'action' => 'list'],array('class'=>'li','escape' => false));

                    echo $this->Html->link('<li>'.__('List Administs').'</li>', ['controller' => 'Administs', 'action' => 'index'],array('class'=>'li','escape' => false));
                    echo $this->Html->link('<li>'.__('List Students').'</li>', ['controller' => 'Students', 'action' => 'index'],array('class'=>'li','escape' => false));
                    echo $this->Html->link('<li>'.__('List Teachers').'</li>', ['controller' => 'Teachers', 'action' => 'index'],array('class'=>'li','escape' => false));
                    echo $this->Html->link('<li>'.__('List Subjects').'</li>', ['controller' => 'Subjects', 'action' => 'index'],array('class'=>'li','escape' => false));
                    echo $this->Html->link('<li>'.__('List Levels').'</li>', ['controller' => 'Levels', 'action' => 'index'],array('class'=>'li','escape' => false));
                echo $this->Html->link('<li>'.__('Report 1').'</li>', ['controller' => 'Fusioncharts', 'action' => 'reportone'],array('class'=>'li','escape' => false));
		echo $this->Html->link('<li>'.__('Report 2').'</li>', ['controller' => 'Fusioncharts', 'action' => 'reporttwo'],array('class'=>'li','escape' => false));


}
                if($a==2){

                  $teacher = TableRegistry::getTableLocator()->get('Teachers');
                  $fg = $teacher->find();
                  $fg->first();
                  $fg->where(['user_id'=>$b]);

           $grades = TableRegistry::getTableLocator()->get('Subjects');
         $as = $grades->find();
         $as->first();
        $as->where(['teacher_id'=>$fg]);
        
        $thearray = (array) $as;
    //    var_dump($thearray);

  //       $this->Flash->error($as['subject']);
    //    if($as!=null){
     //   $collection = $as->toArray();
     //    $as->toArray();
                $this->Flash->error($thearray);
         //$as = $this->Teachers->findbyId($b);
          //    }}
      //  $nino = intval($fg);
//$mm = TableRegistry::getTableLocator()->get('Subjects');
//$as = $mm->find();
// $as->where(['teacher_id'=$ss]);
        
           //         echo $this->Html->link('<li>'.__('teacheress').'</li>', ['controller' => 'Administs', 'action' => 'index'],array('class'=>'li','escape' => false));
                     echo $this->Html->link('<li>'.__('Add Grades').'</li>', ['controller' => 'Grades', 'action' => 'gradestudent',$as],array('class'=>'li','escape' => false));
          		
              }
                if($a==3){
                    
                echo $this->Html->link('<li>'.__('stueddas').'</li>', ['controller' => 'Administs', 'action' => 'index'],array('class'=>'li','escape' => false));
                   }  
            }else{
                                
                }
        ?>

        
    </ul>
</nav>

<div class="users view large-9 medium-8 columns content">
    
<?= $this->Html->image("portada.jpg",[
                    "alt"=>"Portada",
                    "width" => "400", 
                    "height" => "400",
                                    ]); ?> 


       
</div>
