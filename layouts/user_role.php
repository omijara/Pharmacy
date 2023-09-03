<?php require_once('header.php') ?>
 	  <?php if($_SESSION['user_level'] === 'driver'): ?>
        <!-- User menu -->
      <?php include_once('driver_menu.php');?>
  
      <?php elseif($_SESSION['user_level'] === 'coof'): ?>
        <!-- admin menu -->
      <?php include_once('coof_menu.php');?>

      <?php elseif($_SESSION['user_level']=== 'bsk'): ?>
        <!-- Special user -->
      <?php include_once('bsk_menu.php');?>

      <?php elseif($_SESSION['user_level']=== 'badip'): ?>
        <!-- Special user -->
      <?php include_once('badip_menu.php');?>

      <?php elseif($_SESSION['user_level'] === 'ba'): ?>
        <!-- User menu -->
      <?php include_once('admin_menu.php');?>

      <?php elseif($_SESSION['user_level'] === 'dblp'): ?>
        <!-- User menu -->
      <?php include_once('dblp_menu.php');?>

      <?php elseif($_SESSION['user_level'] === 'm4c'): ?>
        <!-- User menu -->
      <?php include_once('m4c_menu.php');?>

      <?php elseif($_SESSION['user_level'] === 'led'): ?>
        <!-- User menu -->
      <?php include_once('led_menu.php');?>

      <?php endif;?>
