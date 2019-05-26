<?php
foreach ($users as $user):
?>
	<h2>Логин: <?=$user[login]?></h2>
	<p>
	   <strong>ID: </strong><?=$user['id']?><br>
	   <strong>Доступ: </strong><?=$user['access']?><br>
	</p>
	<hr>

<?php
endforeach;
?>