<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
require('connexion.php');
function MaildanslaBase($value)
{
	$mail=$db->query('SELECT email FROM client WHERE email="'.$value.'"');
	if($mail->fetch())
	{
		echo"Cette Adresse mail est déjà utilisée";
	}
	return $value;
}
?>
</body>
</html>

