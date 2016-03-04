<?php
/**
 * Created by PhpStorm.
 * User: florian
 * Date: 03/03/16
 * Time: 11:14
 */

namespace AppBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;


class Login
{
    /**
     * @var string
     *
     * @Assert\NotBlank
     */
    protected $login;

    /**
     * @var string
     *
     * @Assert\NotBlank
     */
    protected $password;

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}