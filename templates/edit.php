<?php if(!$userId) header('location: http://spvcx.com'); ?>
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
        <form method="post"  onsubmit="return false;" role="form" class="form-horizontal">
           <div class="form-group has-feedback" >
              <label for="firstame"  class="control-label col-xs-3">Имя</label>
              <div class="col-xs-6">
                 <div class="input-group">    
                    <input type="text" id="firstname" class="form-control inputw" required="required" name="firstname" value=<?php echo $userInfo['firstname']?>>
                 </div>
              </div>
           </div>
           <?php echo "<input type='hidden' id='memValue' value='".$userInfo['user_id']."'>"; ?>
           <div class="form-group has-feedback " >
              <label for="lastname" class="control-label col-xs-3">Фамилия</label>
              <div class="col-xs-6">
                 <div class="input-group">
                    <input type="text" value=<?php echo $userInfo['lastname']?> id="lastname" class="form-control inputw" required="required" name="lastname">
                 </div>
              </div>
           </div>
           <div class="form-group has-feedback " >
              <label for="relations" class="control-label col-xs-3">Семейное положение</label>
              <div class="col-xs-6">
                 <div class="input-group">
                    <select id="relations" class="form-control inputw">
                       <option selected><?php echo $userInfo['relations']?></option>
                       <?php if($userInfo['gender']=== 'Мужской'): ?>
                       <option></option>
                       <option>Не женат</option>
                       <option>Женат</option>
                       <option>Влюблён</option>
                       <?php else: ?>
                       <option>Не замужем</option>
                       <option>Замужем</option>
                       <option>Влюблена</option>
                       <?php endif ?>
                       <option>В активном поиске</option>
                       <option>Встречаюсь</option>
                    </select>
                 </div>
              </div>
           </div>
           <div class="form-group has-feedback " >
              <label for="city" class="control-label col-xs-3">Город</label>
              <div class="col-xs-6">
                 <div class="input-group">
                    <input type="text" <?php 
                       if($userInfo['city'] != '') {
                         echo "value=".$userInfo['city'];
                       }
                       ?> id="city" class="form-control inputw"  name="city">
                 </div>
              </div>
           </div>
           <div class="form-group has-feedback " >
              <label for="city" class="control-label col-xs-3">Веб-сайт</label>
              <div class="col-xs-6">
                 <div class="input-group">
                    <input type="text" <?php 
                       if($userInfo['website'] != '') {
                         echo "value=".$userInfo['website'];
                       }
                       ?> id="website" class="form-control inputw"  name="website">
                 </div>
              </div>
           </div>
           <button type="submit" class="btn btn-primary" onclick='pullMainData()'>Сохранить</button>
        </form>
     </div>
  </div>
  <?php include "templates/include/footer.php" ?>