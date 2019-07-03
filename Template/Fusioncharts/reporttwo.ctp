<?php
use Cake\Core\App;

//App::uses('fusioncharts/fusioncharts.php', 'Vendor');
require_once(ROOT .DS. 'vendor' . DS  . 'fusioncharts' . DS . 'fusioncharts.php');

use Cake\ORM\TableRegistry;

$a = TableRegistry::get('Levels');
$b = TableRegistry::get('Students');

$lev = $a->find();
$est = $b->find();
 

   $chartData = array(
                    "chart"=>array (
                      "caption"=> __("Number of Students per level"),
              //        "subCaption" => "For a net-worth of $1M",
			"animation"=>"1",
                      "showValues"=>"1",
		"showHoverEffect"=> "1",
                      "showPercent" => "1",
              //        "numberPostfix" => "$",
                      "enableMultiSlicing"=>"1",
                      "theme"=> "carbon"
                    ));

                   $data = array();



                foreach($lev as $nivel) {
                  $a=0;
                  $ni=$nivel["level_id"];
                  foreach($est as $es){
                    $estlev = $es["level"];
                    if(intval($estlev)==intval($ni)){
                      $a++;
                    }
                  }
                  array_push($data, array(
                  "label" => $nivel["name"],
                   "value" => $a
                       )
                  );
                  
                  
              }
               
                    
$chartData["data"]=$data;
$jsonEncodedData = json_encode($chartData);

      // chart object
      $Chart = new FusionCharts("pie3d", "chart-1" , "600", "400", "chart-container", "json", $jsonEncodedData);

      // Render the chart
      $Chart->render();
      // closing db connection
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
                

}
                if($a==2){
           $grades = TableRegistry::getTableLocator()->get('Grades');
         $as = $grades->find();
        $as->where(['subject_id'=>11]);
         //$as = $this->Teachers->findbyId($b);

//$mm = TableRegistry::getTableLocator()->get('Subjects');
//$as = $mm->find();
// $as->where(['teacher_id'=$ss]);
        
           //         echo $this->Html->link('<li>'.__('teacheress').'</li>', ['controller' => 'Administs', 'action' => 'index'],array('class'=>'li','escape' => false));
                     echo $this->Html->link('<li>'.__('Add Grades').'</li>', ['controller' => 'Grades', 'action' => 'gradestudent',4],array('class'=>'li','escape' => false));
          		
}
                if($a==3){
                    
                echo $this->Html->link('<li>'.__('stueddas').'</li>', ['controller' => 'Administs', 'action' => 'index'],array('class'=>'li','escape' => false));
                   }  
            }else{
                                
                }
        ?>

        
    </ul>
</nav>

<div id="chart-container"></div>