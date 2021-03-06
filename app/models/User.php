<?php

namespace app\models;

class User extends Model
{
    public $table = 'user';
    public $data = ['email' => null, 'password' => null];

    public function validate()
    {
        $errors = [];

        if (empty($this->data['email'])) {
            $errors['email'] = 'Это обязательное поле';
        } elseif (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Введите валидный адрес электронной почты';
        } else {
            $user = $this->getByEmail();
            if ($user) {
                $errors['email'] = 'Пользователь с данным адресом электронной почты уже зарегистрирован';
            }
        }

        if (empty($this->data['password'])) {
            $errors['password'] = 'Это обязательное поле';
        }

        return $errors;
    }

    public function save()
    {
        $this->data['password'] = password_hash($this->data['password'], PASSWORD_BCRYPT);
        return parent::save();
    }

    public function validatePassword()
    {
        $user = $this->getByEmail();
        return password_verify($this->data['password'], $user['password']);
    }

    public function getByEmail()
    {
        $query = $this->pdo->prepare('SELECT * FROM user WHERE email = :email');
        $query->execute(
            [
                'email' => $this->data['email']
            ]
        );
        return $query->fetch();
    }
}