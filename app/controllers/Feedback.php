<?php

namespace app\controllers;

class Feedback extends Controller
{
    public function actionCreate()
    {
        session_start();
        if (!Site::isAuthed()) {
            require('app/config.php');
            header("Location: " . $config['baseUrl'] . "signin");
        }
        if (isset($_POST['title'])) {
            $feedback = new \app\models\Feedback();
            $feedback->data = [
                'title' => $_POST['title'],
                'text' => $_POST['text'],
                'rating' => $_POST['rating'],
                'flag' => $_POST['flag'],
                'list' => $_POST['list']
            ];

            $errors = $feedback->validate();
            if (!$errors && $feedback->save()) {
                $success = true;
                header("Refresh:1");
            }
        }

        $this->view->render(
            'feedbackForm.php',
            [
                'title' => 'Обратная связь',
                'errors' => $errors,
                'success' => isset($success) ?? false
            ]
        );
    }

    public function actionIndex()
    {
        $this->actionCreate();
    }
}