<?

Use Core\Config;

Use Core\Database\MysqlDatabase;

class App{



    public $title = "Mon super site";

    private $db__instance;

    private static $__instance;


    public static function getInstance(){

        if(is_null(self::$__instance)) self::$__instance = new App();

        return self::$__instance;

    }



    public static function load(){

        session_start();

        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();

        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();

    }

    public function getTable($name){

    $class_name = '\\App\\Table\\'. ucfirst($name) . 'Table';

    return new $class_name($this->getDb());

}

    public function getDb(){

        $config = Config::getInstance(ROOT .'/config/config.php');

        if(is_null($this->db__instance)) $this->db__instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));

        return $this->db__instance;
    }




}