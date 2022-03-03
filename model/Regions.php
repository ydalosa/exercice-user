<?php

namespace App\model;

use App\core\Dao;

class Regions extends \App\core\Model
{
    use CommonFrance;
    private $code;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    public function getAll()
    {
        return Dao::getMany(self::class );
    }


}