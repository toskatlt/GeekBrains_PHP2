<?php

foreach ($users as $user):

?>

<h3><?=$user[login]?></h3>
<p>
   <strong>ID: </strong><?=$user[id]?><br>
   <strong>Доступ: </strong><?=$user[access]?><br>
</p>
<hr>

<?php
	
	endforeach;
	
?>	