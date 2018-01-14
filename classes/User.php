
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
        ':password'=>$this->password,':firstname'=>$this->firstname,':lastname'=>$this->lastname));
        echo "Вы успешно зарегистрировались";
       // print"email: ".$this->email." password: ".$this->password." firstname: ".$this->firstname." lastname: ".$this->lastname;

    }
    
    

}

?>