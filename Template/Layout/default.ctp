<?php

$cakeDescription = 'Blas Pascal';
?>


<!DOCTYPE html>
<html>


<!-- Basic -->



<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>


  
 
    <!-- Bootstrap CSS -->
    <?= $this->Html->css('bootstrap.min.css') ?>
    <!-- Site CSS -->
   <?= $this->Html->css('my_style.css') ?>

    <!-- ALL VERSION CSS -->
    <?= $this->Html->css('versions.css')?>
    <?= $this->Html->css('tabla.css')?>
    <!-- Responsive CSS -->
    <?= $this->Html->css('responsive.css')?>
    <!-- Custom CSS -->
    <?= $this->Html->css('custom.css')?>

<?= $this->Html->script('./fusioncharts/fusioncharts.js') ?>

<?= $this->Html->script('./modernizer.js') ?>
<?= $this->Html->script('./scroll.js') ?>



<meta name="viewport" content="width=device-width, initial-scale=1">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>


<body class="host_version"> 

 

    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://198.23.255.30/~u20161966/colegio/">
                    <img src="img/insignia.png" style="height: 55px"  alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-host">



                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item active" ><?= $this->Html->link(__('Home'), ['controller'=>'Users','action'=>'index','_full'=>true],array('class'=>'nav-link')) ?></li>
                        <li class="nav-item " ><?= $this->Html->link(__('Administs'), ['controller'=>'Administs','action'=>'index','_full'=>true],array('class'=>'nav-link')) ?></li>
                    

                        <li class="nav-item "><?= $this->Html->link(__('Teachers'),['controller'=>'Teachers','action'=>'index','_full'=>true],array('class'=>'nav-link')) ?></li>
                            
                    
                        
                        <li class="nav-item"><?= $this->Html->link(__('Students'), ['controller'=>'Students','action'=>'index','_full'=>true],array('class'=>'nav-link')) ?></li>

                                      
                        <!--<li class="nav-item"><a class="nav-link" href="#">Comunicados</a></li>-->                       
                       
			                     <li class="nav-item" ><?= $this->Html->image("icons/spain.png",[
                                    "alt"=>"Espa  ol",
                                    "width" => "40",
                                    "height" => '40',
                                    "url"=>['controller'=>'App','action'=> 'change-language','es_PE']]); ?> </li>
                                <li class="nav-item"><?= $this->Html->image("icons/usa.png",[
                                    "alt"=>"English",
                                    "width" => "40",
                                    "height" => '40',
                                    "url"=>['controller'=>'App','action'=> 'change-language','en_US']]); ?> </li>
                                <li class="nav-item"><?= $this->Html->image("icons/bra.png",[
                                    "alt"=>"Portugues",
                                    "width" => "40",
                                    "height" => '40',
                                    "url"=>['controller'=>'App','action'=> 'change-language','pt_BR']]); ?> </li>

    

                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li>
                             <?php
                            if( is_null($this->request->getSession()->read('Auth.User')))
                            {
                                echo $this->Html->link(
                                    '<span>'.__('Login').'</span>',
                                    ['controller'=>'Users','action'=>'login','_full'=>true],array('class'=>'hover-btn-new log orange', 'escape' => false)
                                );

                            }else{
                                echo $this->Html->link(
                                    '<span>'.__('Logout').'</span>',
                                    ['controller'=>'Users','action'=>'logout','_full'=>true],array('class'=>'hover-btn-new log orange', 'escape' => false)
                                );
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="ops">
        <?php
                            if( $this->request->getSession()->read('Auth.User'))
                            {
                                $a = $this->getRequest()->getSession()->read('Auth.User.username');

                                echo 'Session: '.$a;
                            }else{
                                
                                }
                            ?>
    </div><!-- end copyrights -->
     
            
   
    </header>



   
    <?= $this->Flash->render() ?>

       <div class="container clearfix">
        <?= $this->fetch('content') ?>
    

  </div>

    <footer class="footer">
        <div class="container">
           <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>About US</h3>
                        </div>
                        <p> EL mejor colegio para sus hijos </p>   
                        <div class="footer-right">
                            <ul class="footer-links-soi">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-github"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul><!-- end links -->
                        </div> 
                        <div>
                                    

                        </div>
                    </div><!-- end clearfix -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Enlace de Informacion</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="#">Home</a></li>
                          
                            <li><a href="https://www.google.com/maps/place/Colegio+Particular+Mixto+Blas+Pascal/@-16.39968,-71.5277245,17z/data=!3m1!4b1!4m5!3m4!1s0x91424a54c8bc28dd:0xad37db6fb2346056!8m2!3d-16.39968!4d-71.5255305">Contact</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
                
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:aarroroh@gmail.com">aarroroh@gmail.com</a></li>
                            <li><a href="#">198.23.255.30/~u20161966/colegio </a></li>
                            <li>Av- Goyeneche 344, Arequipa, Perú</li>
                            <li>(054) 284300</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
                
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->


    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">SmartEDU</a> Design By : <a href="https://html.design/">html design</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="../js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="../js/custom.js"></script>
    <script src="../js/timeline.min.js"></script>
    <script>
        timeline(document.querySelectorAll('.timeline'), {
            forceVerticalMode: 700,
            mode: 'horizontal',
            verticalStartPosition: 'left',
            visibleItems: 4
        });
    </script>
   
</body>
</html>
