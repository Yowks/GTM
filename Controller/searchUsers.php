<?php
if(isset($_POST['go'])){
	$name="%".$_POST['name']."%";
    $listUsers = $users -> search($name);

}else {
    $listUsers =$users -> displayAllUsers();
}

?>