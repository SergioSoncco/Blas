<?php /**

 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

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

<script src="js/modernizer.js"></script>
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

            

                <div class="collapse navbar-collapse" id="navbars-host">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="/~u20161966/colegio">Home</a></li>
                      
                        <li class="nav-item " ><?= $this->Html->link(__('Administs'), ['controller'=>'Administs','action'=>'index','_full'=>true],array('class'=>'nav-link')) ?></li>
                        <li class="nav-item dropdown">

                            <li class="nav-item "><?= $this->Html->link(__('Teachers'),['controller'=>'Teachers','action'=>'index','_full'=>true],array('class'=>'nav-link')) ?></li>
                            
                        </li>
                        <li class="nav-item">
		
                            <li class="nav-item"><?= $this->Html->link(__('Students'), ['controller'=>'Students','action'=>'index','_full'=>true],array('class'=>'nav-link')) ?></li>

                        </li>

                        <li class="nav-item"><a class="nav-link" href="#">News</a></li>

			<li class="nav-item dropdown">
			<li >
                                            <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"
                                                    role="button" aria-haspopup="true" aria-expanded="false" href="#">
                                                        en
                                                        <i class="fa fa-menu-en fa-chevron-down"></i>
                                                    </a>
                                            <ul class="dropdown-menu">
                                            
                                                <li></li>
                                            
                                                <li><a href="../pt/index.html">pt</a></li>
                                            
                                                <li><a href="../es/index.html">es</a></li>
                                            
                                                <li><a href="../ja/index.html">ja</a></li>
                                            
                                                <li><a href="../fr/index.html">fr</a></li>
                                            
                                                <li><a href="../zh/index.html">zh</a></li>
                                            
                                                <li><a href="../tr/index.html">tr</a></li>
                                            
                                                <li><a href="../ru/index.html">ru</a></li>
                                            
                                            </ul>
                                        </li>

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
    </header>

    <!-- End header -->
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
                            <ul>
                                <li><?= $this->Html->image("icons/spain.png",[
                                    "alt"=>"Español",
                                    "url"=>['controller'=>'App','action'=> 'change-language','es_PE']]); ?> </li>
                                <li><?= $this->Html->image("icons/usa.png",[
                                    "alt"=>"English",
                                    "url"=>['controller'=>'App','action'=> 'change-language','en_US']]); ?> </li>    
                                <li><?= $this->Html->image("icons/bra.png",[
                                    "alt"=>"Portugues",
                                    "url"=>['controller'=>'App','action'=> 'change-language','pt_BR']]); ?> </li>    

                                </ul>

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
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
                
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">info@yoursite.com</a></li>
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
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/timeline.min.js"></script>
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
