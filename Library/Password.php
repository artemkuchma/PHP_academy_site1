<?php


class Password {
    const SALT_TEXT = 'Phenylbis(2,4,6-trimethylbenzoyl)phosphine oxide';
    private $password;
    private $hashedPassword;
    private $salt;

    public function __construct($password, $saltText = self::SALT_TEXT)
    {
        $password = trim($password);
        $this->password = $password;
        $this->salt = md5($saltText);
        $this->hashedPassword = md5($this->salt . $password);
    }
    public function __toString()
    {
        return $this->hashedPassword;
    }
}