<?php if(!$userId) header('location: http://spvcx.com'); ?>
      <?php 
         $userPageId = $_GET['id'];
         $userPageInfo = DB::query('SELECT * FROM user_info WHERE user_id=:user_id',array(':user_id'=>$userPageId))[0];
         if(!$userPageInfo) header('Location: http://spvcx.com');
         $own = ($userId == $userPageId) ? True : False;
         $results['pageTitle'] = $userPageInfo['firstname']." ".$userPageInfo['lastname'];
         ?>
      <?php include "templates/include/header.php" ?>
      <div class="left-column-wrap">
         <div class="card text-center">
            <img style='width:200px; height:300px;' src="<?php echo ($userPageInfo['avatar'] == '') ? 'userimages/def.png' : 'userimages/'.$userPageInfo['avatar'] ?>" alt="Card image cap" class="card-img-top img-radius">
            <?php  if($own) : ?>
            <div class="card-block">
               <button class="btn btn-default for-btn" type='button' data-toggle='modal' data-target='#avatarUpload'>Редактировать</button>
               <div id="avatarUpload" class="modal fade">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <?php echo "<input type='hidden' id='memValue' value='".$userPageId."'>"; ?>
                        <div class="modal-header">
                           <button class="close" type='button' data-dismiss='modal'>x</button>
                           <h4 class="modal-title">Загрузка новой фотографии</h4>
                        </div>
                        <div class="modal-body">
                           <p>Друзьям будет проще узнать Вас, если Вы загрузите свою настоящую фотографию. Вы можете загрузить изображение в формате JPG, GIF или PNG.</p>
                           <form action="editdata.php" method="post" enctype="multipart/form-data" id="formAvatar">
                              <label class="btn btn-primary">
                              Выберите файл <input type="file" style="display: none;" id="avatar" name="avatar" >
                              </label>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php endif ?>
         </div>
      </div>
      <?php include "templates/include/footer.php" ?>