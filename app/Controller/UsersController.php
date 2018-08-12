<?php

namespace app\Controller;


use Core\HTML\BootstrapForm;

use app;



class UsersController extends AppController{

    public function login(){

        if(!empty($_POST)) {

            $errors = false;

            $auth = new \Core\Auth\DBAuth(App::getInstance()->getDB());

            if($auth->login($_POST['username'], $_POST['password']))
                header('Location: index.php?p=admin.posts.index');

            else { $errors = true;  }

        }

        $form = new BootstrapForm($_POST);

        $this->render('users.login', compact('form', 'errors'));

    }

}