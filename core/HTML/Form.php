<?php
namespace Core\HTML;

/**
 * Class Form
 * Permet de générer un formulaire rapidement et simplement
*/
class Form{

    /**
     * @var array Donnée utiliséées par le formulaire
    */
    private $data;

    /**
     * @var string Tag utilisé pour entourer les champs
    */
    public $surround = 'p';

    /**
     * @param array $data
    */
    public function __construct($data = array()){

    	$this->data = $data;


      }

    /**
     * @param $html
     * @return string
     */
    protected  function surround($html){

    	return "<{$this->surround}>{$html}</{$this->surround}>";


    }

    /**
     * @param $index
     * @return null
     */
    protected function getValue($index){

        if(is_object($this->data)) return $this->data->$index;

        return isset($this->data[$index]) ? $this->data[$index] : null;
     
    }

    /**
     * @param $name
     * @return string
     */
    public function input($name, $label, $options = []){

        $type = isset($options['type']) ? $options['type'] : 'text';

        return $this->surround('<input type="'.$type.'" name="'.$name.'" value="'.$this->getValue($name).'">',$surround);

    }


    /**
     * @return string
     */
    public function submit($text='envoyer'){

    	return $this->surround('<button type="submit">'.$text.'</button>',$surround);

    }



}