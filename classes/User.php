
<?php
class User {
    
    public $email;
    public $password;
    public $rpassword;
    public $firstname;
    public $lastname;
    
    public static function Authorized() {

        if(isset($_COOKIE['CID'])) {

        } else {
            return 0;
        }

    }
    
    public function __construct( $data=array() ) {
        if ( isset( $data['email'] ) ) $this->email = $data['email'];
        if ( isset( $data['password'] ) ) $this->password = $data['password'];
        if ( isset( $data['rpassword'] ) ) $this->rpassword = $data['rpassword'];
        if ( isset( $data['firstname'] ) ) $this->firstname = $data['firstname'];
        if ( isset( $data['lastname'] ) ) $this->lastname = $data['lastname'];
    }

    public function storeValues( $params ) {

        $this->__construct( $params );

    }

    public function registerUser() {
        
        DB::query('INSERT INTO user VALUES(\'\',:email,:password,:firstname,:lastname)',array(':email'=>$this->email,
        ':password'=>password_hash($this->password,PASSWORD_BCRYPT),':firstname'=>$this->firstname,':lastname'=>$this->lastname));
        echo "Вы успешно зарегистрировались";
       // print"email: ".$this->email." password: ".$this->password." firstname: ".$this->firstname." lastname: ".$this->lastname;

    }

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
    
    

}

?>