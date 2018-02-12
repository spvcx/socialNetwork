<?php if(!$userId) header('location: http://spvcx.com'); ?>
<?php if(!DB::query('SELECT * FROM user WHERE id=:id',array(':id'=>$_GET['id']))) header('location: http://spvcx.com'); ?>
  <?php include "templates/include/header.php" ?>
  <?php $userInfo = DB::query('SELECT * FROM user_info WHERE user_id=:id',array(':id'=>$_GET['id']))[0] ?>
      <div class="sendmessage-container">
            <div class="sendmessage-receiver">
                <div class="sendmessage-receiver-name"><?php echo $userInfo['firstname']." ".$userInfo['lastname'];?></div>
            </div>
            <div class="sendmessage-messages">
                  <div class="sendmessage-message">message1</div>
                  <div class="sendmessage-message">message2</div>
            </div>
            <div class="sendmessage-send">
                  <div class="sendmessage-input">
                        <input type="text" placeholder='Напишите сообщение...' id="sendmessage_text">
                  </div>
                  <div class="sendmessage-button">
                        <button class="btn btn-default">Отправить</button>
                  </div>

            </div>
      </div>
  <?php include "templates/include/footer.php" ?>