<?php

namespace app\controllers;

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
}