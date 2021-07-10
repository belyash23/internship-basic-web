<?php

namespace app\models;

class SigninForm extends Model
{
    public $data = ['email' => null, 'password' => null];

    public function validate()
    {
        $errors = [];

        if (empty($this->data['email'])) {
            $errors['email'] = 'Это обязательное поле';
        } elseif (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Введите валидный адрес электронной почты';
        } else {
            $user = new User();
            $user->data = [
                'email' => $this->data['email'],
                'password' => $this->data['password'],
            ];

            if (!$user->validatePassword()) {
                $errors['form'] = 'Неверный E-mail или пароль';
            }
        }

        if (empty($this->data['password'])) {
            $errors['password'] = 'Это обязательное поле';
        }

        return $errors;
    }
}