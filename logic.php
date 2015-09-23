<?php
/*
Initiate a blank contestants array
We'll be filling this up with data from the $_POST array
*/
var_dump($_POST);
$contestants = Array();

/*
Here's an example of what the $_POST Array looks like:
Array (
	[contestant0] => Alisha
	[contestant1] => Ben
	[contestant2] => Jill
	[contestant3] => Francis )
*/

# This variable will be used for our bonus features to determine of a) there is no winner or if there is b) how many winners there are
$winner_count = 0;

# Use a foreach loop to loop through the contestants array
foreach($_POST as $key => $value) {

	/*
	Create a variable $coin_flip; set this variable to be either 0 or 1 (i.e. heads or tails)
	Use PHP's rand() function to randomly pick the 0/1
	*/
	$coin_flip = rand(0,1);

	# If the $coin_flip was 1...
	if($coin_flip == 1) {

		# This contestant (i.e. $contestant[$value]) is set to be a "Winner"
		$contestants[$value] = 'Winner';

		# Increment the winner count
		$winner_count++;

	}
	# Otherwise...
	else {

		# This contestant (i.e $contestant[$value]) is set to be a "Loser"
		$contestants[$value] = 'Loser';
	}

} # End of loop
$word_list = Array("able",
"above",
"across",
"add",
"against",
"ago",
"almost",
"among",
"animal",
"answer",
"became",
"become",
"began",
"behind",
"being",
"better",
"black",
"best",
"body",
"book",
"boy",
"brought",
"call",
"cannot",
"car",
"certain",
"change");

$word_count = intval($_POST['word_count']);
$num_words = count($word_list);
$char_list = Array('_', "@", "!", "%");
$num_chars = count($char_list);
$password_array = Array();

//Generate an array for the number of words we need
for ($i = 0; $i < $word_count; $i++)
{
	$password_array[$i] = $word_list[rand(0, $num_words-1)];
}
$password_string = "";

//Concatenate the words with an '_' in between
foreach($password_array as $key => $value)
{
	$password_string=$password_string.$value;
	if ($key != ($word_count - 1))
	{
			$password_string=$password_string.'_';
	}
	else {
		# if special char is needed concatenate that also
		if (isset($_POST['special_char']) && $_POST['special_char'] == 'TRUE')
		{
				$password_string=$password_string.'_'.$char_list[rand(0, $num_chars-1)];
		}
	}
}

//$password_string = $word_list[rand(0, $num_words-1)].$char_list[rand(0, $num_chars-1)].$word_list[rand(0, $num_words-1)];

?>
