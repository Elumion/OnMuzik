<?php


namespace core;


use mysql_xdevapi\Exception;

/**
 * Class Core
 * @package core
 */
class Core
{
    private static $instance;
    private static $mainTemplate;
    private static $db;
    private function __construct()
    {
        global $Config;
        spl_autoload_register( '\core\Core::__autoload');
        self::$db = new \core\DB($Config['Database']['Server'],
            $Config['Database']['Username'],
            $Config['Database']['Password'],
            $Config['Database']['Database']);
    }

    /**
     * get Instance of Core
     * @return Core
     */
    public static function getInstance(){
        if (empty(self::$instance)){
            self::$instance = new Core();
            return self::getInstance();
        }
        else
            return self::$instance;
    }

    /**
     * The main process of the site
     */
    public function run(){
        $path = $_GET['path'];
        $pathParts = explode('/',$path);
        $className = ucfirst( $pathParts[0]);
        if(empty($className))
            $fullClassName = 'controllers\\Site';
        else
            $fullClassName = 'controllers\\'.ucfirst( $className);
        $methodName = ucfirst($pathParts[1]);
        if(empty($methodName))
            $fullMethodName = 'actionIndex';
        else
            $fullMethodName = 'action'.ucfirst($methodName);
        if(class_exists($fullClassName)){
            $controller = new $fullClassName();
            if(method_exists($controller, $fullMethodName)){
                $method = new \ReflectionMethod($fullClassName,$fullMethodName);
                $paramsArray = [];
                foreach ( $method->getParameters() as $parameter){
                    array_push($paramsArray,isset($_GET[$parameter->name]) ? $_GET[$parameter->name] : null);
                }
                $result = $method->invokeArgs($controller, $paramsArray);
                if (is_array($result)){
                    self::$mainTemplate->setParams($result);
                }
            }
            else
                throw new \Exception('404 Not Found');
        }
        else
            throw new \Exception("404 Not Found");

    }

    /**
     * Return db for future work with
     * @return DB
     */
    public function getDB(){
        return self::$db;
    }


    public function init(){
        session_start();
        self::$mainTemplate = new Template();
    }

    /**
     * Shoutdown the cms system and show the results
     */
    public function done(){
        self::$mainTemplate->display('views/layout/index.php');
    }

    public static function __autoload($className)
    {
        $filename = $className.'.php';
        if(is_file($filename))
            include ($filename);

    }
}