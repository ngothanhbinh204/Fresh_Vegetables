<?php
namespace App\model;
class form_validatorModel
{
    public $data;
    public $errors;
    public function __construct($data)
    {
        $this->data = $data;
        $this->errors = [];
    }

    public function required($field)
    {
        if (empty($this->data[$field])) {
            $this->errors[$field] = "Trường này không được để trống";
        }
    }

    public function email($field)
    {
        if (!filter_var($this->data[$field], FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = "Địa chỉ email không hợp lệ";
        }
    }

    public function minLength($field, $length)
    {
        if (strlen($this->data[$field]) < $length) {
            $this->errors[$field] = "Trường này phải có ít nhất $length ký tự";
        }
    }

    public function maxLength($field, $length)
    {
        if (strlen($this->data[$field]) > $length) {
            $this->errors[$field] = "Trường này không được vượt quá $length ký tự";
        }
    }

    public function equalTo($field1, $field2)
    {
        if ($this->data[$field1] != $this->data[$field2]) {
            $this->errors[$field2] = "Hai trường này phải giống nhau";
        }
    }

    public function isValid()
    {
        return empty($this->errors);
    }
}
