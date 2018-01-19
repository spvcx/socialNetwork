<?php if($userId) {
   header('Location: http://spvcx.com');
   }
   ?>
<?php include "templates/include/header.php" ?>
<div class="py-5">
   <div class="container">
      <div class="row text-center">
         <div class="col-md-3"> </div>
         <div class="col-md-6">
            <div class="card text-white p-5 bg-dark">
               <div class="card-body">
                  <h1 class="mb-4">Регистрация</h1>
                  <form role="form" method="post" onsubmit="return false" class="form-horizontal">
                     <!-- Блок для ввода email -->
                     <div class="form-group has-feedback ">
                        <label for="email" class="control-label col-xs-3">Email:</label>
                        <div class="col-xs-6">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                              <input type="email" id="emaill" onchange="emailChangeCheck()" class="form-control" placeholder="youremail@gmail.com" required="required" name="email" >
                           </div>
                           <span class="glyphicon form-control-feedback"></span>
                        </div>
                     </div>
                     <!-- Блок для ввода password -->
                     <div class="form-group has-feedback ">
                        <label for="password" class="control-label col-xs-3">Пароль:</label>
                        <div class="col-xs-6">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-lock "></i></span>
                              <input type="password" id="password" class="form-control" placeholder="Пароль" required="required" name="password">
                           </div>
                           <span class="glyphicon form-control-feedback"></span>
                        </div>
                     </div>
                     <!-- Конец блока для ввода rpassword-->
                     <div class="form-group has-feedback ">
                        <label for="rpassword" class="control-label col-xs-3">Повторите пароль:</label>
                        <div class="col-xs-6">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-lock "></i></span>
                              <input type="password" id="rpassword" class="form-control" placeholder="Пароль"required="required" name="rpassword">
                           </div>
                           <span class="glyphicon form-control-feedback"></span>
                        </div>
                     </div>
                     <div class="form-group has-feedback ">
                        <label for="firstname" class="control-label col-xs-3">Имя:</label>
                        <div class="col-xs-6">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
                              <input type="text" id="firstname" class="form-control" placeholder="Ваше имя" required="required" name="firstname">
                           </div>
                           <span class="glyphicon form-control-feedback"></span>
                        </div>
                     </div>
                     <div class="form-group has-feedback ">
                        <label for="lastname" class="control-label col-xs-3">Фамилия:</label>
                        <div class="col-xs-6">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
                              <input type="text" id="lastname" class="form-control" placeholder="Ваша фамилия" required="required" name="lastname">
                           </div>
                           <span class="glyphicon form-control-feedback"></span>
                        </div>
                     </div>
                     <div class="form-group has-feedback " id="gender">
                        <label for="gender" class="control-label col-xs-3">Пол</label>
                        <div class="col-xs-6">
                           <div class="input-group">
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="gendermale" value="Мужской" checked>
                                 <label class="form-check-label" for="gendermale">Мужской</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="genderfemale" value="Женский">
                                 <label class="form-check-label" for="genderfemale">Женский</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <button type="submit" name='createaccount' onclick="ajaxRegister(this.form)" class="btn btn-success">Зарегистрироваться</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include "templates/include/footer.php" ?>