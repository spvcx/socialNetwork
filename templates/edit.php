<?php include "templates/include/header.php" ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class='active'><a href="http://spvcx.com/?action=editmain">Основное</a></li>
            <li><a href="http://spvcx.com/?action=editstudy">Учеба</a></li>
            <li><a href="http://spvcx.com/?action=editinterests">Интересы </a></li>
        </ul>
    </div>
    
    <div class="panel-body">
        <div class="text-center">
            <?php $userInfo = DB::query('SELECT * FROM user WHERE id=:user_id',array(':user_id'=>$userId))[0];
            
            ?>
        
        <form method="post" id="form" onsubmit="return false;" role="form" class="form-horizontal">
                <div class="form-group has-feedback" id="firstname">
                  <label for="firstame"  class="control-label col-xs-3">Имя</label>
                  <div class="col-xs-6">
                    <div class="input-group">    
                      <input type="text" id="firstname" class="form-control inputw" required="required" name="firstname" value=<?php echo $userInfo['firstname']?>>
                    </div>
                  </div>
                </div>


              <div class="form-group has-feedback " id="lastname">
                <label for="lastname" class="control-label col-xs-3">Фамилия</label>
                <div class="col-xs-6">
                  <div class="input-group">
                    <input type="text" value=<?php echo $userInfo['lastname']?> id="lastname" class="form-control inputw" required="required" name="lastname">
                  </div>
                </div>
              </div>


              <div class="form-group has-feedback " id="relations">
                <label for="relations" class="control-label col-xs-3">Семейное положение</label>
                <div class="col-xs-6">
                  <div class="input-group">
                    <select id="relations" class="form-control inputw">
                        <option selected><?php echo $userInfo['relations']?></option>
                        <option>Не женат</option>
                        <option>Женат</option>
                        <option>В активном поиске</option>
                        <option>В встречаюсь</option>
                        <option>Влюблён</option>
                    </select>
                  </div>
                </div>
              </div>



              

              <div class="form-group has-feedback " id="city">
                <label for="city" class="control-label col-xs-3">Город</label>
                <div class="col-xs-6">
                  <div class="input-group">
                    <input type="text" <?php if(isset($userInfo['city']))
                    {
                      echo "value=".$userInfo['city'];
                    }
                    ?> id="city" class="form-control inputw" required="required" name="city">
                  </div>
                </div>
              </div>

              

              <div class="form-group has-feedback " id="dateborn">
                <label for="dateborn" class="control-label col-xs-3">Дата рождения</label>
                <div class="col-xs-6">
                  <div class="input-group">
                    <div class="selectblock">
                    <select id="dateday" class="form-control lowselects">
                      <option selected>1</option>
                      <?php
                      for($i=1;$i<=31;$i++) {
                        echo "<option>".$i."</option>";
                      }
                      ?>
                    </select>

                    <select id="datemonth" class="form-control lowselects">
                      <option selected>Января</option>
                      <option>1</option>
                    </select>

                    <select id="dateyear" class="form-control lowselects">
                      <option selected>1985</option>
                      <option>1</option>
                    </select>
                    </div>
                  </div>

                </div>
              </div>


              <button type="submit" class="btn btn-primary">Сохранить</button>
          
        </form>



    </div>
    
</div>
<?php include "templates/include/footer.php" ?>