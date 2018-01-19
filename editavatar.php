<?php
require ('config.php');


if(isset($_POST)) {
      $userId = $_POST['user_id'];
      $name = $userId.$_FILES['avatar']['name'];
      
      DB::query('UPDATE user_info SET avatar=:avatar WHERE user_id=:user_id',array(':user_id'=>$userId,':avatar'=>$name));
      move_uploaded_file($_FILES['avatar']['tmp_name'],"userimages/".$name);
      echo 'success';
      
}

?>