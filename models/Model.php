<?php
namespace Model;

// Model\Model
class Model
{
    protected $cn = '';
    protected $table = '';

    function __construct() { // Je lie la DB ici.
        $dbConfig = parse_ini_file( 'db.ini' );

        $pdoOptions = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ];
        try{
            $dsn = sprintf( '%s:host=%s;dbname=%s', $dbConfig[ 'driver' ], $dbConfig[ 'host' ], $dbConfig[ 'dbname' ] );
            $this -> cn = new \PDO( $dsn, $dbConfig[ 'username' ], $dbConfig[ 'password' ], $pdoOptions );
            $this -> cn -> exec( 'SET CHARACTER SET UTF8' );
            $this -> cn -> exec( 'SET NAMES UTF8' );
        } catch( \PDOException $e ) {
            die( $e -> getMessage() );
        }
    }

    public function all() { // Je récupère toutes les données de la DB ici.
        $sql = 'SELECT * FROM '.$this -> table;
        $stmnt = $this -> cn -> query( $sql );

        return $stmnt;
    }

    public function find( $id ) { // Je récupère la donnée que je veux ici.
        $sql = 'SELECT * FROM ' . $this -> table . ' WHERE id = :id';
        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [ 'id' => $id ] ); // Je remplace le :id par la variable $id.

        return $stmnt -> fetch();
    }
}
