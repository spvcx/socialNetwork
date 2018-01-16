<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $results['pageTitle']?></title>
    <!--<script src="js/bootstrap.min.js"></script>-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!--<script src="js/notifies.js"></script>-->
    <script src="js/main.js"></script>
    
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
        <a class="navbar-brand" href="/">YGK SCNet</a>
        <?php if ($userId): ?>

        <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Аккаунт <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Моя страница</a></li>
            <li><a href="#">Редактировать</a></li>
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
    <!-- end will in the footer.php -->

    
