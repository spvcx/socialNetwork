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
           <div class="form-group has-feedback " id="dateborn">
              <label for="dateborn" class="control-label col-xs-3">Дата рождения</label>
              <div class="col-xs-6">
                 <div class="input-group">
                    <div class="selectblock">
                       <nav class="dateborn">
                          <ul class="bornmenu">
                             <li>
                                <input type="text" id='bday' onclick='openDayMenu()' name='bday' class="form-control lowselects" value='<?php echo $userInfo["bday"]?>'>
                                <ul class="downmenu" id="daymenu">
                                   <?php 
                                    for($i = 1; $i <= 31; $i++) {
                                      echo "<li><a onclick='setBday(this.text)'>$i</a></li>";
                                    }
                                   ?>
                                </ul>
                             </li>
                             <li>
                             <input type="text" id='bmonth'  onclick='openMonthMenu()' name='bmonth' class="form-control lowselects" value='<?php echo $userInfo["bmonth"]?>'>
                                <ul class="downmenu" id="monthmenu">
                                   <?php
                                    $months = array();
                                    $months[] = 'Января';
                                    $months[] = 'Февраля';
                                    $months[] = 'Марта';
                                    $months[] = 'Апреля';
                                    $months[] = 'Мая';
                                    $months[] = 'Июня';
                                    $months[] = 'Июля';
                                    $months[] = 'Августа';
                                    $months[] = 'Сентября';
                                    $months[] = 'Октября';
                                    $months[] = 'Ноября';
                                    $months[] = 'Декабря';
                                    for($i = 0; $i < count($months); $i++) {
                                      echo "<li><a onclick='setMonth(this.text)'>$months[$i]</a></li>";
                                    }
                                   ?>
                                </ul>
                             </li>
                             <li>
                             <input type="text" id='byear' onclick='openYearMenu()' name='byear' class="form-control lowselects" value='<?php echo $userInfo["byear"]?>'>
                                <ul class="downmenu" id="yearmenu">
                                <?php 
                                    for($i = 2018; $i >= 1920; $i--) {
                                      echo "<li><a onclick='setYear(this.text)'>$i</a></li>";
                                    }
                                   ?>
                                </ul>
                             </li>
                          </ul>
                       </nav>
                    </div>
                 </div>
              </div>
           </div>
           <div class="form-group has-feedback " >
              <label for="relations" class="control-label col-xs-3">Семейное положение</label>
              <div class="col-xs-6">
                 <div class="input-group">
                    <select id="relations" class="form-control inputw">
                       <option id="0"selected><?php echo $userInfo['relations']?></option>
                       <?php if($userInfo['gender']=== 'Мужской'): ?>
                       <option id="1">Не женат</option>
                       <option id="2">Женат</option>
                       <option id="3">Влюблён</option>
                       <?php else: ?>
                       <option id="1">Не замужем</option>
                       <option id="2">Замужем</option>
                       <option id="3">Влюблена</option>
                       <?php endif ?>
                       <option id="4">В активном поиске</option>
                       <option id="5">Встречаюсь</option>
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
           <button type="submit" class="btn btn-primary btnmargin" onclick='pullMainData()'>Сохранить</button>
        </form>
     </div>
  </div>
  <?php include "templates/include/footer.php" ?>