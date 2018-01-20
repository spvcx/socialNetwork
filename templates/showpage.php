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
            <img style='width:200px; height:300px; padding-top:5px;' src="<?php echo 'userimages/'.$userPageInfo['avatar'] ?>" alt="Card image cap" class="card-img-top img-radius">
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

      <div class="right-column-wrap">
            <div class="page-info-block">
                  <div class="page-info-wrap">
                        <div class="page-info-name">
                              <h2 class="page-name"><?php echo $userPageInfo['firstname']." ".$userPageInfo['lastname'];?></h2>
                        </div>
                        <?php if($userPageInfo['city'] != '' or $userPageInfo['relations'] != '' or $userPageInfo['relations'] != '') :?>
                        <div class="page-profile-info clear_fix">
                              <div class="row-info">
                                    <div class="info-label-header">День рождения</div>
                                    <div class="info-label">10 октября 1984 г.</div>
                              </div>
                              <?php if($userPageInfo['city'] != '') : ?>
                              <div class="row-info">
                                    <div class="info-label-header">Город</div>
                                    <div class="info-label"><?php echo $userPageInfo['city']?></div>
                              </div>
                              <?php endif ?>
                              <?php if($userPageInfo['relations'] != '') : ?>
                              <div class="row-info">
                                    <div class="info-label-header">Семейное пололжение</div>
                                    <div class="info-label"><?php echo $userPageInfo['relations']?></div>
                              </div>
                              <?php endif ?>
                              <?php if($userPageInfo['website'] != '') : ?>
                              <div class="row-info">
                                    <div class="info-label-header">Веб-сайт</div>
                                    <div class="info-label"><?php echo $userPageInfo['website']?></div>
                              </div>
                              <?php endif ?>
                        </div>
                        <?php endif ?>
                        <div class="info-block clear_fix">
                              <div class="info-header">
                                    <span class="label-info-header">Интересы</span>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <?php include "templates/include/footer.php" ?>