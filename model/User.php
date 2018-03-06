<?php
class User
{
    private $firstname;

    private $lastname;

    private $stackLearn = [];

    private $password;

    private $sex;

    private $age;

    private $growth;

    private $listFruits;

    public static $salt='pIz@TiM$';

    public static function getSalt() {
        return self::$salt;
    }

    public function  setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    public function getFullName() {
        return $this->firstname . ' ' .$this->lastname;
    }
    public function isValidFullName()
    {
        return strlen($this->firstname) >=3 &&
               strlen($this->lastname) >=3;
    }

    public function setStackLearn($stackLearn)
    {
        $this->stackLearn = $stackLearn;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @param mixed $growth
     */
    public function setGrowth($growth)
    {
        $this->growth = $growth;
    }

    /**
     * @param mixed $listFruits
     */
    public function setListFruits($listFruits)
    {
        $this->listFruits = $listFruits;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return array
     */
    public function getStackLearn()
    {
        return $this->stackLearn;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getGrowth()
    {
        return $this->growth;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return mixed
     */
    public function getListFruits()
    {
        return $this->listFruits;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
}