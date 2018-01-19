<?php if(!$userId) header('location: http://spvcx.com'); ?>
    <?php include "templates/include/header.php" ?>
    <div class="card text-center">
        <?php
           $userInfo = DB::query('SELECT * FROM user_info WHERE user_id=:user_id',array(':user_id'=>$userId))[0];
           ?>
       <img style='width:200px; height:200px;' src="<?php echo ($userInfo['avatar'] == '') ? 'userimages/def.png' : 'userimages/'.$userInfo['avatar'] ?>" alt="Card image cap" class="card-img-top img-thumbnail">
       <div class="card-block">
          <button class="btn btn-primary" type='button' data-toggle='modal' data-target='#avatarUpload'>Редактировать</button>
            <div id="avatarUpload" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <?php echo "<input type='hidden' id='memValue' value='".$userInfo['user_id']."'>"; ?>
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
    </div>
    <div class="panel panel-default">
       <div class="panel-body">
          <input type="email" class="form-control" placeholder="Что у вас нового?">
          <button type="button" class="btn btn-default pull-right margin-top">Отправить</button>
       </div>
    </div>
    <a href="#">
       <div class="thumbnail principal-post">
          <img src="https://cdn2.img.ria.ru/images/101715/73/1017157341.jpg">
          <div class="caption">
             <h2>В США подготовили законопроект о санкциях за "вмешательство в выборы"</h2>
             <span class="date-of-post">16 января 2017</span>
             <p>ВАШИНГТОН, 16 янв – РИА Новости. Американские сенаторы представили законопроект, предусматривающий введение жестких санкций против России и других стран за "вмешательство" в предстоящие выборы в США, сообщил один из авторов инициативы сенатор от штата Флорида Марко Рубио.</p>
          </div>
       </div>
    </a>
    <a href="#">
       <div class="thumbnail principal-post">
          <img src="https://cdn2.img.ria.ru/images/101715/73/1017157341.jpg">
          <div class="caption">
             <h2>В США подготовили законопроект о санкциях за "вмешательство в выборы"</h2>
             <span class="date-of-post">16 января 2017</span>
             <p>ВАШИНГТОН, 16 янв – РИА Новости. Американские сенаторы представили законопроект, предусматривающий введение жестких санкций против России и других стран за "вмешательство" в предстоящие выборы в США, сообщил один из авторов инициативы сенатор от штата Флорида Марко Рубио.</p>
          </div>
       </div>
    </a>
    </div>
    <?php include "templates/include/footer.php" ?>