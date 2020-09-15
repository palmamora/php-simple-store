<?php

class UserController
{

    public function index()
    {
        echo 'hola gente';
    }

    public function register()
    {
        require_once 'views/user/register.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $name = (isset($_POST['name'])) ? $_POST['name'] : null;
            $lastName = (isset($_POST['lastName'])) ? $_POST['lastName'] : null;
            $email = (isset($_POST['email'])) ? $_POST['email'] : null;
            $password = (isset($_POST['passwd'])) ? $_POST['passwd'] : null;

            $user = new User();
            $user->User('null', $name, $lastName, $email, $password, 'user', 'null');
            $save = $user->save();

            if ($save) {
                echo 'Sign Up Successful.';
                $_SESSION['register'] = 'complete';
            } else {
                echo 'Sign Up Failed.';
                exit();
                $_SESSION['register'] = 'failed';
            }
        }
        header('Location:' . base_url . 'user/register');
    }

    public function login()
    {
        if (isset($_POST)) {
            $email = (isset($_POST['email'])) ? $_POST['email'] : null;
            $passwd = (isset($_POST['password'])) ? $_POST['password'] : null;
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($passwd);
            $login = $user->login();

            if ($login!=false) {
                $_SESSION['login'] = 'successful';
                $_SESSION['name'] = $login->name;
                $_SESSION['lastName'] = $login->lastName;
                $_SESSION['role'] = $login->role;
                $_SESSION['email'] = $login->email;
            }else{
                $_SESSION['login'] = 'failed';
            }
        }

        header('Location:' . base_url);
    }
}
