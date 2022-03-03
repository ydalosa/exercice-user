<?php

declare(strict_types=1);

namespace App\model;

use App\core\Dao;
use App\core\Model;

/**
 * Class User
 * @package App\model
 * @author Houssem TAYECH <houssem@forticas.com>
 */
class User extends Model
{
    private int $id;
    private string $email;
    private string $password;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function beforeInsertInSession()
    {
        unset($this->password);
    }
    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        if (strlen($password) <6 )
        {
            throw new \Exception("Le mot de passe est trop court");
        }
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getOneByMail(string $email) : ?User
    {
        $user  = Dao::getOne(self::class , ['email' => $email]);
        // le USER ou FALSE
        if ($user == false)
        {
            $user = null;
        }
        return $user;
    }

    public function insert()
    {

        Dao::insertOne($this,  get_object_vars($this));
    }

}