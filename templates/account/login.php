<?php include "templates/include/header.php" ?>
<div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-dark">
            <div class="card-body">
              <h1 class="mb-4">Вход</h1>
              <form action="login.php" method="post">
                <div class="form-group"> <label>Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Введите email"> </div>
                <div class="form-group"> <label>Пароль</label>
                  <input type="password" name="password" class="form-control" placeholder="Введите пароль"> </div>
                <button type="submit" class="btn btn-success">Войти</button><button class="btn btn-primary left-margin"><a href="http://spvcx.com/?action=register">Создать аккаунт</a></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include "templates/include/footer.php" ?>