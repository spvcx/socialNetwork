<?php if(!$userId) header('location: http://spvcx.com'); ?>
    <?php include "templates/include/header.php" ?>

    <?php $usersInfo = DB::query('SELECT * FROM user_info',array());?>
                  <?php foreach($usersInfo as $user) { ?>
                  <a href="http://spvcx.com/?action=showpage&id=<?php echo $user['user_id']?>">
                        <div class="panel panel-default margin-top">
                              <div class="panel-body">
                                    <div class="panel-infos clearfix">
                                          <div class="search-myimg"><img class ="search-img" src="<?php echo 'userimages/'.$user['avatar'] ?>" alt=""></div>
                                          <div class="panel-names"><?php echo $user['firstname']." ".$user['lastname'];?></div>
                                    </div>
                              </div>
                        </div>
                        </a>
                  <?php } ?>
    <?php include "templates/include/footer.php" ?>