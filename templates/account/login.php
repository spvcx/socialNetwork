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
                  <h1 class="mb-4">Вход</h1>
                  <div id="to-alerts"></div>
                    
                  <form method="post" id="form" onsubmit="return false;" role="form" class="form-horizontal">
                     <!-- Блок для ввода email -->
                     <div class="form-group has-feedback" id="emailfeed">
                        <label for="email"  class="control-label col-xs-3">Email:</label>
                        <div class="col-xs-6">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>         
                              <input type="email" id="email" class="form-control" required="required" name="email" >
                           </div>
                           <span class="glyphicon form-control-feedback"></span>
                        </div>
                     </div>
                     <!-- Блок для ввода password -->
                     <div class="form-group has-feedback " id="passwordfeed">
                        <label for="password" class="control-label col-xs-3">Password:</label>
                        <div class="col-xs-6">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-lock "></i></span>
                              <input type="password" id="password" class="form-control" required="required" name="password">
                           </div>
                           <span class="glyphicon form-control-feedback"></span>
                        </div>
                     </div>
                     <button type="submit" name='login' id="login" onclick="ajaxLogin()" class="btn btn-success mx-auto right-margin">Войти</button><a href="http://spvcx.com/?action=register" class="btn btn-primary right-margin">Создать аккаунт</a>
                     <!-- Конец блока для ввода password-->
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include "templates/include/footer.php" ?>