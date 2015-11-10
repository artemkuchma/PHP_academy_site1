<?php


class ContactModel {
    public $name;
    public $email;
    public $message;

    public function __construct(Request $request)
    {
        $this->name = $request->post('name');
        $this->email = $request->post('email');
        $this->message = $request->post('message');
    }

    public function isValid()
    {
        return $this->name !== '' && $this->email !== ''&& $this->message !== '';

    }

}