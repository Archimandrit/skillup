<?php
class User123
{
    private $login;

    private $password;

    private $email;
    private $tet;
    public function setTet($tet)
    {
        $this->tet = $tet;
    }
    public function getTet()
    {
        return $this->tet;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public  function setEmail($email)
    {
        $this->email = $email;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
       return $this->email;
    }

}
