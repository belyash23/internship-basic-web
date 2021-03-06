<?php

namespace app\controllers;

use app\models\SigninForm;
use app\models\User;

class Site extends Controller
{
    public function actionSignup()
    {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $user->data = [
                'email' => $email,
                'password' => $password
            ];

            $errors = $user->validate();
            if (!$errors && $user->save()) {
                $success = true;
                header("Refresh:1; url=signin");
            }
        }

        $this->view->render(
            'signup.php',
            [
                'title' => 'Регистрация',
                'errors' => $errors,
                'success' => isset($success) ?? false
            ]
        );
    }

    public function actionIndex()
    {
        $this->actionSignup();
    }

    public function actionSignin()
    {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $model = new SigninForm();
            $model->data = [
                'email' => $email,
                'password' => $password
            ];

            $errors = $model->validate();

            if (!$errors) {
                $success = true;
                header("Refresh:1; url=feedback/create");
                self::auth($email, $password);
            }
        }

        $this->view->render(
            'signin.php',
            [
                'title' => 'Авторизация',
                'errors' => $errors,
                'success' => isset($success) ?? false
            ]
        );
    }

    public function actionSignout()
    {
        unset($_SESSION['isAuthed']);
        header('Location: signin');
    }

    public static function auth($email, $password)
    {
        $_SESSION['isAuthed'] = true;
    }

    public static function isAuthed()
    {
        return isset($_SESSION['isAuthed']) ?? false;
    }
}