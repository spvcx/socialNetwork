<?php
require ('config.php');

if (isset($_POST['maindata'])) {
	DB::query('UPDATE user_info SET firstname=:firstname, lastname=:lastname,
     relations=:relations, city=:city, website=:website, bday=:bday, bmonth=:bmonth, byear=:byear WHERE user_id=:user_id', array(
		':firstname' => $_POST['firstname'],
		':lastname' => $_POST['lastname'],
		':relations' => $_POST['relations'],
		':city' => $_POST['city'],
		':website' => $_POST['website'],
		':bday' => $_POST['bday'],
		':bmonth' => $_POST['bmonth'],
		':byear' => $_POST['byear'],
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

if(isset($_POST['otdelenie'])) {
	$otdNumb = $_POST['otdnum'];
	$groups = DB::query('SELECT id,name FROM student_groups WHERE otdelenie_id=:otd',array(':otd'=>$otdNumb));
	print_r(json_encode($groups)) ;
}

if(isset($_POST['setGroup'])) {
	$user_id = $_POST['id'];
	$groupId = $_POST['groupid'];
	DB::query('UPDATE user_info SET groupid=:groupid WHERE user_id=:id',array(':id'=>$user_id,':groupid'=>$groupId));
	echo 'success';
}

?>