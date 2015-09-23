<?php
error_reporting(-1); # Report all PHP errors
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>XKCD password generator</title>
	<?php require 'logic.php'; ?>
	<link rel="stylesheet" href="custom.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

	<h1>XKCD Password Generator</h1>
	<a href="https://commons.wikimedia.org/wiki/File%3AScrabble_game_in_progress.jpg">Image From Creative Commons</a><br/>
	<img src="Scrabble_game_in_progress.jpg" alt="scrabble image" />
	<form class="form_prop" method='POST' action='index.php'>

	<!--	<input type='text' name='contestant0'><br>
		<input type='text' name='contestant1'><br>
		<input type='text' name='contestant2'><br>
		<input type='text' name='contestant3'><br> -->

		Number of words: <input type="number" size="6" name="word_count" min="2" max="5" value="2"><br/>
		Add Special character:<input type="checkbox" name="special_char" value="TRUE" /><br />

		<input type='submit' value='Display a password!'>

	</form>

	<!-- Bonus features! -->
	<br/>

	<?php
		if (strlen($password_string) > 0)
		{
			echo "Word count was ", $word_count," <br />";
			echo "Special characer was ",($special_char == TRUE) ? 'set.': 'not set.';
			echo "<h2>Your new password is ".$password_string."</h2>";
		}
		else {
			echo '<h2>Password is not created yet.</h2>';
		}

	?>


</body>
</html>
