<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php echo $results['pageTitle']?></title>
      <!--<script src="js/bootstrap.min.js"></script>-->
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      
      <!--<link rel="stylesheet" type="text/css" href="css/bootstrap3.min.css" />-->
      <!--
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         -->
      <!--<link rel="stylesheet" type="text/css" href="css/bootstrap-theme3.min.css" />-->
      <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css" />
   </head>
   <body>
      <div class="menu">
         <nav class="navbar">
            <div class="container">
               <a class="navbar-brand white-color" href="/">YGK SCNet</a>
               <?php if ($userId): ?>
               <ul class="nav navbar-nav navbar-right">
               <?php $userInfo = DB::query('SELECT * FROM user_info WHERE user_id=:user_id',array(':user_id'=>$userId))[0]; ?>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" class="white-color" data-toggle="dropdown"><?php echo $userInfo['firstname']; ?><img src="<?php echo 'userimages/'.$userInfo['avatar'] ?>" alt="" class="top-profile-img">
                         <b class="caret"></b></a>
                     <ul class="dropdown-menu">
                        <li><a href="http://spvcx.com/?action=showpage&id=<?php echo $userId?>">Моя страница</a></li>
                        <li><a href="http://spvcx.com/?action=editmain">Редактировать</a></li>
                        <li><a href="#">Настройки</a></li>
                        <li class="divider"></li>
                        <li><a href="http://spvcx.com/?action=logout">Выйти</a></li>
                     </ul>
                  </li>
               </ul>
               <?php endif ?>
            </div>
         </nav>
      </div>
      <div class="container">
      <?php if($userId): ?>
      <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3">
         <div class="sidebar-nav">
            <div class style="width:210px; margin:0; padding:0;">
               <ul class="nav nav-list">
                  <li><a href="http://spvcx.com/?action=showpage&id=<?php echo $userId?>"> <span class="glyphicon glyphicon-home" style="margin-right:10px;"></span>Моя Страница</a></li>
                  <li><a href="/"> <span class="glyphicon glyphicon-folder-open" style="margin-right:10px;"></span>Новости</a></li>
                  <li><a href="#"> <span class="glyphicon glyphicon-envelope" style="margin-right:10px;"></span>Мои Сообщения <span class="badge badge-info">111</span></a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-user" style="margin-right:10px;"></span>Мои друзья </a></li>
                  <li ><a href="#"> <span class="glyphicon glyphicon-search" style="margin-right:10px;"></span>Поиск</a></li>
               </ul>
            </div>
         </div>
      </div>
      <?php endif?>
      <div class="col-lg-9 col-md-9 col-sm-9" style="padding-top:0px;">
      <!-- end will in the footer.php -->