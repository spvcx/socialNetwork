<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YGK SCNet</title>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">YGK SCNet</a>
        <?php if ($authorized): ?>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Моя страница
                <!--<span class="sr-only">(current)</span>-->
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Редактировать аккаунт</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Выйти</a>
            </li>
          </ul>
        </div>
        <?php endif ?>
      </div>
    </nav>
</head>
<body>
    
