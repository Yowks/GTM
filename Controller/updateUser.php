<?php

if(isset($_POST['edit_user'])){

   $users->updateSpecialUser(
      $_POST['user_id'],
      addslashes($_POST['name']),
      addslashes($_POST['first_name']),
      addslashes($_POST['email']),
      addslashes($_POST['phone']),
      addslashes($_POST['student_number']),
      addslashes($_POST['user_level']),
      addslashes($_POST['actif'])
   );
}

?>
