<?php

namespace app\models;

class Feedback extends Model
{
    public $table = 'feedback';
    public $data = [
        'title' => null,
        'text' => null,
        'rating' => null,
        'flag' => null,
        'list' => null
    ];
    public $ratingValues = [1, 2, 3, 4, 5];
    public $flagValues = [1, 2, 3];
    public $listValues = ['option1', 'option2', 'option3'];

    public function validate()
    {
        $errors = [];

        if (empty($this->data['title'])) {
            $errors['title'] = 'Это обязательное поле';
        } elseif (empty($this->data['text'])) {
            $errors['text'] = 'Это обязательное поле';
        } elseif (empty($this->data['rating'])) {
            $errors['rating'] = 'Это обязательное поле';
        } elseif (!in_array($this->data['rating'], $this->ratingValues)) {
            $errors['rating'] = 'Некорректное значение';
        } elseif (!in_array($this->data['flag'], $this->flagValues) && !empty($this->data['flag'])) {
            $errors['flag'] = 'Некорректное значение';
        } elseif (!in_array($this->data['list'], $this->listValues) && !empty($this->data['list'])) {
            $errors['list'] = 'Некорректное значение';
        }

        return $errors;
    }

    public function save()
    {
        return parent::save();
    }
}