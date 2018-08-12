<?

class Carfactory {

    public static function getCar($type){

        $class_name = "Car_".$type;

        return new $class_name();

    }

}