<?

namespace Core;


class Config {

    private $settings = [];

    private static $__instance;



    public static function getInstance($file){

        if(is_null(self::$__instance)) self::$__instance = new Config($file);

        return self::$__instance;

    }



    public function __construct($file){


        $this->settings = require ($file);

    }


    public function get($key){

        if(!isset($this->settings[$key])) return null;

        else return $this->settings[$key];

    }



}