<?php
require('config.php');
if(isset($_POST['userpost'])) {
      $id = $_POST['user_id'];
      $postBody = $_POST['post_body'];
      $bodyId = $_POST['body_id'];
      if(DB::query('SELECT id FROM user WHERE id=:user_id',array(':user_id'=>$id))){
            DB::query('INSERT INTO user_posts VALUES(\'\', :body_id, :user_id, :postbody, 0)',array(':postbody'=>$postBody,'user_id'=>$id,':body_id'=>$bodyId));
            echo 'success';
      }
}

?>