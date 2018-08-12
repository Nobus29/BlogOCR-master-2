<?

namespace Core\Controller;


class Controller {

    protected $viewPath;
    protected $template;

    protected function render($view, $variables = []){

        ob_start();
        extract($variables);

        require ($this->viewPath . str_replace('.','/',$view) . '.php');
        $content = ob_get_clean();

        require ($this->viewPath . "templates/" . $this->template . '.php');

    }


    protected function forbidden(){

        header('HTTP/1,1 403 Forbiden');
        die('Acces interdit');

    }

    protected function notFound(){

        header('HTTP/1.0 404 not Found');
        die('Page introuvable');

    }

}
