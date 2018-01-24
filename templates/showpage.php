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
            <img class='image-avatar' src="<?php echo 'userimages/'.$userPageInfo['avatar'] ?>" alt="Card image cap" class="card-img-top img-radius">
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
            <?php else: ?>
            <div class="card-block">
               <a href="/" class="btn btn-primary for-btn">Написать сообщение</a>
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
                        <?php if($userPageInfo['bday'] != '' and $userPageInfo['bmonth'] != ''  and $userPageInfo['byear'] != '') : ?>
                              <div class="row-info">
                                    <div class="info-label-header">День рождения</div>
                                    <div class="info-label"><?php echo $userPageInfo['bday'].' '.$userPageInfo['bmonth'].' '.$userPageInfo['byear'].' г.'; ?></div>
                              </div>
                        <?php endif ?> 
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
                                    <span class="label-info-header">ЯГК</span>
                              </div>
                              <div class="row-info">
                                    <div class="info-label-header">Отделение</div>
                                    <div class="info-label">ОИТУП</div>
                              </div>
                              <div class="row-info">
                                    <div class="info-label-header">Группа</div>
                                    <div class="info-label">ИС1-41</div>
                              </div>
                        </div>
                        <?php if($userPageInfo['about'] != '' 
                        or $userPageInfo['interests'] != '' 
                        or $userPageInfo['music'] != '' 
                        or $userPageInfo['tvshow'] != '' 
                        or $userPageInfo['books'] != '' 
                        or $userPageInfo['games'] != '' ) :?>
                        <div class="info-block clear_fix">
                              <div class="info-header">
                                    <span class="label-info-header">Дополнительная информация</span>
                              </div>
                              <?php if($userPageInfo['about'] != '') : ?>
                              <div class="row-info">
                                    <div class="info-label-header">О себе</div>
                                    <div class="info-label"><?php echo $userPageInfo['about']?></div>
                              </div>
                              <?php endif ?>
                              <?php if($userPageInfo['interests'] != '') : ?>
                              <div class="row-info">
                                    <div class="info-label-header">Интересы</div>
                                    <div class="info-label"><?php echo $userPageInfo['interests']?></div>
                              </div>
                              <?php endif ?>
                              <?php if($userPageInfo['music'] != '') : ?>
                              <div class="row-info">
                                    <div class="info-label-header">Любимая музыка</div>
                                    <div class="info-label"><?php echo $userPageInfo['music']?></div>
                              </div>
                              <?php endif ?>
                              <?php if($userPageInfo['tvshow'] != '') : ?>
                              <div class="row-info">
                                    <div class="info-label-header">Любимые тв-шоу</div>
                                    <div class="info-label"><?php echo $userPageInfo['tvshow']?></div>
                              </div>
                              <?php endif ?>
                              <?php if($userPageInfo['books'] != '') : ?>
                              <div class="row-info">
                                    <div class="info-label-header">Любимые книги</div>
                                    <div class="info-label"><?php echo $userPageInfo['books']?></div>
                              </div>
                              <?php endif ?>
                              <?php if($userPageInfo['games'] != '') : ?>
                              <div class="row-info">
                                    <div class="info-label-header">Любимые игры</div>
                                    <div class="info-label"><?php echo $userPageInfo['games']?></div>
                              </div>
                              <?php endif ?>
                        </div>
                        <?php endif ?>
                  </div>
            </div>
            
            <div class="panel panel-default margin-top">
                  <div class="panel-body">
                  <input id='post_body' type="text" class="form-control" placeholder="<?php if($own):?>Что у вас нового?<?php else:?>Напишите пост<?php endif?>">
                        <button type="button" class="btn btn-default pull-right margin-top" onclick="sendPost(<?php if($own) echo $userPageId; else echo $userId;?>, <?php echo $userPageId?>)">Отправить</button>
                  </div>
            </div>
            
            <?php if(DB::query('SELECT * FROM user_posts WHERE body_id=:body_id',array(':body_id'=>$userPageId))): ?>
                  <?php $postsInfo = DB::query('SELECT * FROM user_posts WHERE body_id=:body_id ORDER BY id DESC',array(':body_id'=>$userPageId));?>
                  <?php foreach($postsInfo as $currentPost) { ?>
                        <div class="panel panel-default margin-top">
                              <div class="panel-body">
                                    <div class="panel-infos clearfix">
                                    <?php $postedBy = DB::query('SELECT * FROM user_info WHERE user_id=:user_id',array(
                                          ':user_id'=>$currentPost['user_id']
                                    ))[0]; ?>
                                          <div class="panel-myimg"><img class ="post-img" src="<?php echo 'userimages/'.$postedBy['avatar'] ?>" alt=""></div>
                                          <div class="panel-names"><?php echo $postedBy['firstname']." ".$postedBy['lastname'];?></div>
                                    </div>
                                    <div class="panel-text">
                                          <p><?php echo $currentPost['body'];?></p>
                                    </div>
                                    
                        </div>
                              <div class="panel-footer">
                                    <span class="glyphicon glyphicon-heart" onclick='addLike()'style="margin-right:10px; cursor:pointer;color:red;"></span>1
                              </div>
                        </div>
                  <?php } ?>
            <?php endif ?>

            
      </div>
      <?php include "templates/include/footer.php" ?>