<?php
use Cake\Core\App;

//App::uses('fusioncharts/fusioncharts.php', 'Vendor');
require_once(ROOT .DS. 'vendor' . DS  . 'fusioncharts' . DS . 'fusioncharts.php');

use Cake\ORM\TableRegistry;

$chartData = TableRegistry::get('Roles');
$chartDat = TableRegistry::get('Users');

$query = $chartData->find();
$quer = $chartDat->find()->where(['status !=' => 0]);

    $arrData = array(
        "chart" => array(
            "animation"=>"1",
            "caption"=> __("Number of users per level"),
        //    "subCaption"=> "students x level",
            "xAxisName"=> __("Roles"),
            "yAxisName"=> __("Users"),
            "showValues"=> "1",
            "paletteColors"=> "#ff8500", 
            "showHoverEffect"=> "1",
            "use3DLighting"=> "0",
            "showaxislines"=> "1",
            "baseFontSize"=> "13",
            "theme"=> "zune"
            )
            );
            // creating array for categories object

            
            $data=array();

            $adm=0;
            $pro=0;
            $est=0;

      //        foreach($query as $row) {

          //      $value = $row["name"];
                
          //      array_push($data, array(
         //       "label" => $row["name"],
        //        ));
       //     } 

            foreach($quer as $row) {

                $value = $row["role"];
                if($value==1){
                  $adm++;
                }
                if($value==2){
                  $pro++;
                }
                if($value==3){
                  $est++;
                }
                
               
            }  
             array_push($data, array(
              "label"=>__("Administs"),
                "value" => ($adm)
          
                ));   
               array_push($data, array(
              "label"=>__("Teachers"),
            
                "value" => ($pro)
               
                )); 
                array_push($data, array(
              "label"=>__("Students"),
                "value" => ($est)
               
              
                ));         

          // pushing category array values
          

      $arrData["data"]=$data;



      $jsonEncodedData = json_encode($arrData);

      $columnChart = new FusionCharts("column3d", "chart-1", "600", "300", "chart-container", "json", $jsonEncodedData);
 
            // Render the chart
            $columnChart->render();
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