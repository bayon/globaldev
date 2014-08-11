<?php
$secret="!9966youllNeverKnowEat1100!";
$wrong_secret="duh?";

// LEFT OFF HERE maybe off to a false start ...better check
//http://localhost/GlobalDev/apps/global_api/api_1.php
?>
<form method="post" action="../../global_api/api_1.php" >
	<input type="hidden" name="secret" value="<?=$secret;?>"/>
	<input type="submit" name ="method" value="get_users"/>
</form>
