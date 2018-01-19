<?php if(!$userId) header('location: http://spvcx.com'); ?>
<?php include "templates/include/header.php" ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li><a href="http://spvcx.com/?action=editmain">Основное</a></li>
            <li class='active'><a href="http://spvcx.com/?action=editstudy">Учеба</a></li>
            <li><a href="http://spvcx.com/?action=editinterests">Интересы </a></li>
        </ul>
    </div>
    
    <div class="panel-body">
        <div class="text-center">
            <?php $userInfo = DB::query('SELECT * FROM user WHERE id=:user_id',array(':user_id'=>$userId))[0];
            
            ?>
        
        <form method="post" id="form" onsubmit="return false;" role="form" class="form-horizontal">
                <div class="form-group has-feedback" id="firstname">
                  <label for="email"  class="control-label col-xs-3">Имя</label>
                  <div class="col-xs-6">
                    <div class="input-group">    
                      <input type="text" id="firstname" class="form-control inputw" required="required" name="firstname" value=<?php echo $userInfo['firstname']?>>
                    </div>
                  </div>
                </div>


              <div class="form-group has-feedback " id="lastname">
                <label for="password" class="control-label col-xs-3">Фамилия</label>
                <div class="col-xs-6">
                  <div class="input-group">
                    <input type="text" value=<?php echo $userInfo['lastname']?> id="lastname" class="form-control inputw" required="required" name="lastname">
                  </div>
                </div>
              </div>

              <div class="form-group has-feedback " id="city">
                <label for="password" class="control-label col-xs-3">Город</label>
                <div class="col-xs-6">
                  <div class="input-group">
                    <input type="text" value=<?php echo $userInfo['city']?> id="city" class="form-control inputw" required="required" name="city">
                  </div>
                </div>
              </div>

              <div class="form-group has-feedback " id="about">
                <label for="about" class="control-label col-xs-3">О себе</label>
                <div class="col-xs-6">
                  <div class="input-group">
                    <textarea class="form-control inputw" rows="2" id="about"><?php echo $userInfo['about']?></textarea>
                  </div>
                </div>
              </div>


              <button type="submit" class="btn btn-primary">Сохранить</button>
          
        </form>



    </div>
    
</div>
<?php include "templates/include/footer.php" ?>