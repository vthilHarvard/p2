<?php
error_reporting(-1); # Report all PHP errors
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>XKCD password generator</title>
	<?php require 'logic.php'; ?>
</head>
<body>

	<h1>XKCD Password Generator</h1>

	<form method='POST' action='index.php'>

		<input type='text' name='contestant0'><br>
		<input type='text' name='contestant1'><br>
		<input type='text' name='contestant2'><br>
		<input type='text' name='contestant3'><br>

		<input type="checkbox" name="special_char" value="special_char" />Special character<br />

		<input type='submit' value='Pick the winners!'>

	</form>

	<?php //print_r($_POST); ?>

	<?php foreach($contestants as $key => $value) { ?>
		<?php echo htmlspecialchars($key, ENT_QUOTES, 'UTF-8');?> is a <?php echo $value?><br>
	<?php } ?>

	<!-- Bonus features! -->
	<br/>
	<?php if($winner_count == 0) { ?>
		No winners this round :(

	<?php } elseif($winner_count > 1) { ?>
		It's a tie!
	<?php } ?><br />P
	<?php echo 'Password is '.$password_string; ?>
	<p>
		<a href='./index.php'>Get new password</a>
	</p>

</body>
</html>
