<?php


namespace core\Auth;
use Core\Database\Database;


/**
 * Class DBAuth
 * @package core\Auth
 */
class DBAuth {

    /**
     * @var Database
     */
    private $db;

    public function __construct(Database $db){

        $this->db = $db;

    }

    public function getUserId(){

        if($this->logged())return $_SESSION['auth'];

        else false;

    }

    /**
     * @param $username
     * @param $password
     * return boolean
     */
    public function login($username, $password){

        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);

        if($user) {

            if( $user->password === sha1($password)) $_SESSION['auth'] = $user->id;
            return true;
        }

        return false;


    }

    public function logged(){

        return isset($_SESSION['auth']);

    }

}