<form action="" method="post">
	<input type="search" name="name">
	<input type="submit" name="go">
</form>
	
<?php

	

foreach($listUsers as $ligne){
	?>
		<span><?= $ligne['id'].'-'.$ligne['name'] ?></span>
		<a href="<?= $correctSlug ?>users/edit_user/<?= $ligne['id'] ;?>">Editer l'utilisateur</a>
		<br>
	<?php
}
	

	
?>