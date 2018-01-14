<?php
class DB {

    public static function connect() {

        $PDO = new PDO(DB_N,DB_USERNAME,DB_PASSWORD);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $PDO;

    }

    public static function query($query,$params=array()) {

        $statement = self::connect()->prepare($query);
        $statement->execute($params);

        if( explode(' ',$query)[0] == 'SELECT' ) {
            $data = $statement->fetchAll();
            return $data;
        }
        
    }
}

?>