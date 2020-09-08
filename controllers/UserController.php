<?php

class UserController{

    public function index(){
        echo 'hola gente';
    }

    public function register(){
        require_once 'views/user/register.php';
    }

    public function save(){
        if(isset($_POST)){
            $name = (isset($_POST['name'])) ? $_POST['name'] : null;
            $lastName = (isset($_POST['lastName'])) ? $_POST['lastName'] : null;
            $email = (isset($_POST['email'])) ? $_POST['email'] : null;
            $password = (isset($_POST['passwd'])) ? $_POST['passwd'] : null;

            $user = new User();
            $user->User('null',$name,$lastName,$email,$password,'user','null');
            $save = $user->save();

            if ($save) {
                echo 'Sign Up Successful.';
            }else{
                echo 'Sign Up Failed.';
            }
        }
    }
} 