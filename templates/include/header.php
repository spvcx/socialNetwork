<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $results['pageTitle']?></title>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">YGK SCNet</a>
        <?php if ($userId): ?>
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
              <a class="nav-link" href="http://spvcx.com/?action=logout">Выйти</a>
            </li>
          </ul>
        </div>
        <?php endif ?>
      </div>
    </nav>
    <div class="container">
    <!-- end will in the footer.php -->
</head>
<body>
    
