<?php if(!$userId) header('location: http://spvcx.com'); ?>
  <?php include "templates/include/header.php" ?>
  <div class="panel panel-default">
  <div class="panel-heading">
     <ul class="nav nav-tabs">
        <li><a href="http://spvcx.com/?action=editmain">Основное</a></li>
        <li><a href="http://spvcx.com/?action=editstudy">Учеба</a></li>
        <li class='active'><a href="http://spvcx.com/?action=editinterests">Интересы </a></li>
     </ul>
  </div>
  <div class="panel-body">
     <div class="text-center">
        <?php 
           $userInfo = DB::query('SELECT * FROM user_info WHERE user_id=:user_id',array(':user_id'=>$userId))[0];
           ?>
        <form method="post" id="form" onsubmit="return false;" role="form" class="form-horizontal">
           <div class="form-group has-feedback " >
              <label for="about" class="control-label col-xs-3">О себе</label>
              <div class="col-xs-6">
                 <div class="input-group">
                    <textarea class="form-control inputw" rows="2" id="about"><?php echo $userInfo['about']?></textarea>
                 </div>
              </div>
           </div>
           <div class="form-group has-feedback " >
              <label for="about" class="control-label col-xs-3">Интересы</label>
              <div class="col-xs-6">
                 <div class="input-group">
                    <textarea class="form-control inputw" rows="2" id="interests"><?php echo $userInfo['interests']?></textarea>
                 </div>
              </div>
           </div>
           <?php echo "<input type='hidden' id='memValue' value='".$userInfo['user_id']."'>"; ?>
           <div class="form-group has-feedback " >
              <label for="about" class="control-label col-xs-3">Любимая музыка</label>
              <div class="col-xs-6">
                 <div class="input-group">
                    <textarea class="form-control inputw" rows="2" id="music"><?php echo $userInfo['music']?></textarea>
                 </div>
              </div>
           </div>
           <div class="form-group has-feedback " >
              <label for="about" class="control-label col-xs-3">Любимые тв-шоу</label>
              <div class="col-xs-6">
                 <div class="input-group">
                    <textarea class="form-control inputw" rows="2" id="tvshow"><?php echo $userInfo['tvshow']?></textarea>
                 </div>
              </div>
           </div>
           <div class="form-group has-feedback " >
              <label for="about" class="control-label col-xs-3">Любимые книги</label>
              <div class="col-xs-6">
                 <div class="input-group">
                    <textarea class="form-control inputw" rows="2" id="books"><?php echo $userInfo['books']?></textarea>
                 </div>
              </div>
           </div>
           <div class="form-group has-feedback " >
              <label for="about" class="control-label col-xs-3">Любимые игры</label>
              <div class="col-xs-6">
                 <div class="input-group">
                    <textarea class="form-control inputw" rows="2" id="games"><?php echo $userInfo['games']?></textarea>
                 </div>
              </div>
           </div>
           <button type="submit" class="btn btn-primary" onclick="pullInterestsData()">Сохранить</button>
        </form>
     </div>
  </div>
  <?php include "templates/include/footer.php" ?>