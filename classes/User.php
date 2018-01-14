<?php
class User {

    public static function Authorized() {

        if(isset($_COOKIE['CID'])) {

        } else {
            return 0;
        }

    }

}

?>