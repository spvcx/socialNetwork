
<?php
class User

{
	public $email;

	public $password;

	public $firstname;

	public $lastname;

	public $gender;

	public static

	function Authorized()
	{
		if (isset($_COOKIE['CID'])) {
			if (DB::query('SELECT user_id FROM cookie_token WHERE token=:token', array(
				':token' => sha1($_COOKIE['CID'])
			))) {
				$user_id = DB::query('SELECT user_id FROM cookie_token WHERE token=:token', array(
					':token' => sha1($_COOKIE['CID'])
				)) [0]['user_id'];
				return $user_id;
			}
		}
		else {
			return 0;
		}
	}

	public

	function __construct($data = array())
	{
		$this->email = isset($data['email']) ? $data['email'] : 'e';
		$this->password = isset($data['password']) ? $data['password'] : 'p';
		$this->firstname = isset($data['firstname']) ? $data['firstname'] : 'f';
		$this->lastname = isset($data['lastname']) ? $data['lastname'] : 'l';
		$this->gender = isset($data['gender']) ? $data['gender'] : 'g';
	}

	public

	function storeValues($params)
	{
		$this->__construct($params);
	}

	public

	function registerUser()
	{
		DB::query('INSERT INTO user VALUES(\'\',:email,:password)', array(
			':email' => $this->email,
			':password' => password_hash($this->password, PASSWORD_BCRYPT)
		));
		$this->setCID();
		/*
		DB::query('INSERT INTO user VALUES(\'\',:email,:password)',array(':email'=>$this->email,
		':password'=>$this->password));
		*/
		$userId = DB::query('SELECT id FROM user WHERE email=:email', array(
			':email' => $this->email
		)) [0]['id'];
		DB::query('INSERT INTO user_info VALUES(\'\',:user_id,:firstname,:lastname,:gender,:relations,:city,:about,:interests,:music,:tvshow,:books,:games,:avatar)', array(
			':user_id' => $userId,
			':firstname' => $this->firstname,
			':lastname' => $this->lastname,
			':gender' => $this->gender,
			':relations' => '',
			':city' => 'Ð¯Ñ€Ð¾ÑÐ»Ð°Ð²Ð»ÑŒ',
			':about' => '',
			':interests' => '',
			':music' => '',
			':tvshow' => '',
			':books' => '',
			':games' => '',
			':avatar' => ''
		));
		echo "Ð’Ñ‹ ÑƒÑÐ¿ÐµÑˆÐ½Ð¾ Ð·Ð°Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð»Ð¸ÑÑŒ";
	}

	public

	function loginUser()
	{
		if (DB::query('SELECT  email FROM user WHERE email=:email', array(
			':email' => $this->email
		))) {
			if (password_verify($this->password, DB::query('SELECT password FROM user WHERE email=:email', array(
				':email' => $this->email
			)) [0]['password'])) {
				$this->setCID();
				echo 'success';
			}
			else {
				echo 'password';
			}
		}
		else {
			print 'email';
		}

		/*
		if(DB::query('SELECT  email FROM user WHERE email=:email',array(':email'=>$this->email))) {
		if ($this->password == DB::query('SELECT password FROM user WHERE email=:email', array(':email'=>$this->email))[0]['password'])  {
		$this->setCID();
		echo 'success';
		} else {
		echo 'password';
		}
		} else {
		print 'email';
		}*/
	}

	public

	function setCID()
	{
		$c = True;
		$token = $token = bin2hex(openssl_random_pseudo_bytes(64, $c));
		$userId = DB::query('SELECT id FROM user WHERE email=:email', array(
			':email' => $this->email
		)) [0]['id'];
		DB::query('INSERT INTO cookie_token VALUES(\'\',:user_id,:token)', array(
			':user_id' => $userId,
			':token' => sha1($token)
		));
		setcookie("CID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
	}
}

?>