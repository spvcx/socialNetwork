<?php if(!$userId) header('location: http://spvcx.com'); ?>
  <?php include "templates/include/header.php" ?>
      <div class="message-container">
            <div class="message-row clear_fix">
                  <div class="message-receiver-photo"><img src="userimages/def.png" alt=""></div>
                  <div class="message-info">
                        <div class="message-receiver">Имя Фамилия</div>
                        <div class="message-sender">
                              <div class="message-sender-photo"><img src="userimages/def.png" alt=""></div>
                              <div class="message-sender-lasttext">Последнее сообщение лалал..</div>
                        </div>
                  </div>
            </div>

            <div class="message-row clear_fix">
                  <div class="message-receiver-photo"><img src="userimages/def.png" alt=""></div>
                  <div class="message-info">
                        <div class="message-receiver">Кек Кеков</div>
                        <div class="message-sender">
                              <div class="message-sender-photo"><img src="userimages/def.png" alt=""></div>
                              <div class="message-sender-lasttext">Последнее сообщение лалал..</div>
                        </div>
                  </div>
            </div>
      </div>
  <?php include "templates/include/footer.php" ?>