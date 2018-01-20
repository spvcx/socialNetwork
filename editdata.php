<?php
require ('config.php');

if (isset($_POST['maindata'])) {
	DB::query('UPDATE user_info SET firstname=:firstname, lastname=:lastname,
     relations=:relations, city=:city, website=:website WHERE user_id=:user_id', array(
		':firstname' => $_POST['firstname'],
		':lastname' => $_POST['lastname'],
		':relations' => $_POST['relations'],
		':city' => $_POST['city'],
		':website' => $_POST['website'],
		':user_id' => $_POST['id']
	));
	echo 'success';
}

if (isset($_POST['interests'])) {
	DB::query('UPDATE user_info SET about=:about, interests=:interests, music=:music, tvshow=:tvshow, books=:books,
    games=:games WHERE user_id=:user_id', array(
		':user_id' => $_POST['id'],
		':about' => $_POST['about'],
		':interests' => $_POST['interests'],
		':music' => $_POST['music'],
		':tvshow' => $_POST['tvshow'],
		':books' => $_POST['books'],
		':games' => $_POST['games']
	));
	echo 'success';
}

?>