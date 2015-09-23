<?php
/*
Initiate a blank contestants array
We'll be filling this up with data from the $_POST array
*/
//var_dump($_POST);
//$contestants = Array();

/*
Here's an example of what the $_POST Array looks like:
Array (
	[contestant0] => Alisha
	[contestant1] => Ben
	[contestant2] => Jill
	[contestant3] => Francis )
*/
//Word list from Page 1 of paulknoll.com
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
$password_string = "";
$special_char = FALSE;

if (!empty($_POST))
{
		$num_words = count($word_list);
		$char_list = Array("#", "?", "@", "!", "%");
		$num_chars = count($char_list);
		$password_array = Array();

		$word_count = intval($_POST['word_count']);
		//echo 'Word count is '.$word_count;

		//Generate an array for the number of words we need
		for ($i = 0; $i < $word_count; $i++)
		{
			$password_array[$i] = $word_list[rand(0, $num_words-1)];
		}


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
						$special_char = TRUE;
						$password_string=$password_string.'_'.$char_list[rand(0, $num_chars-1)];
				}
				else {
						$special_char = FALSE;
				}
			}
		}
}//if form has been posted

//$password_string = $word_list[rand(0, $num_words-1)].$char_list[rand(0, $num_chars-1)].$word_list[rand(0, $num_words-1)];

?>
