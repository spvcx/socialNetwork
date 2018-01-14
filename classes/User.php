
<?php
class User {
    
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    
    public static function Authorized() {

        if(isset($_COOKIE['CID'])) {
            if(DB::query('SELECT user_id FROM cookie_token WHERE token=:token',array(':token'=>sha1($_COOKIE['CID'])))) {
                $user_id = DB::query('SELECT user_id FROM cookie_token WHERE token=:token',array(':token'=>sha1($_COOKIE['CID'])));
                return $user_id;
            }
        } else {
            return 0;
        }

    }
    
    public function __construct( $data=array() ) {

        $this->email = isset($data['email']) ? $data['email'] : 'e';
        $this->password = isset($data['password']) ? $data['password'] : 'p';
        $this->firstname = isset($data['firstname']) ? $data['firstname'] : 'f';
        $this->lastname = isset($data['lastname']) ? $data['lastname'] : 'l';
    
    }

    public function storeValues( $params ) {

        $this->__construct( $params );

    }

    public function registerUser() {
        
        DB::query('INSERT INTO user VALUES(\'\',:email,:password,:firstname,:lastname)',array(':email'=>$this->email,
        ':password'=>password_hash($this->password,PASSWORD_BCRYPT),':firstname'=>$this->firstname,':lastname'=>$this->lastname));
        $this->setCID();
        header('Location: /');
        echo "Вы успешно зарегистрировались";
       // print"email: ".$this->email." password: ".$this->password." firstname: ".$this->firstname." lastname: ".$this->lastname;

    }
    /*
    public static function loginUser($e,$p) {
        if(DB::query('SELECT  email FROM user WHERE email=:email',array(':email'=>$e))) {
            if (password_verify($p, DB::query('SELECT password FROM user WHERE email=:email', array(':email'=>$e))[0]['password']))  {
                echo "Успешная авторизация";
            } else {
                echo 'Неправильный пароль';
            }    
        } else {
            echo "Пользователя с таким email не существует";
        }

    }
    */
    public  function loginUser() {

        if(DB::query('SELECT  email FROM user WHERE email=:email',array(':email'=>$this->email))) {
            if (password_verify($this->password, DB::query('SELECT password FROM user WHERE email=:email', array(':email'=>$this->email))[0]['password']))  {
                $this->setCID();
                header('Location: /');
            } else {
                echo 'Неправильный пароль';
            }    
        } else {
            echo "Пользователя с таким email не существует";
        }

    }

    public function setCID() {

        $c = True;
        $token = $token = bin2hex(openssl_random_pseudo_bytes(64, $c));
        $userId = DB::query('SELECT id FROM user WHERE email=:email',array(':email'=>$this->email))[0]['id'];
        DB::query('INSERT INTO cookie_token VALUES(\'\',:token,:user_id)',array(':token'=>sha1($token), ':user_id'=>$userId));
        setcookie("CID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);

    }
    
    
    

}

?>