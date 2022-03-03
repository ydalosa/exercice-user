<?php

namespace App\model;

use App\core\Dao;

class Departments extends \App\core\Model
{
    use CommonFrance;
    private $region_code;
    private $code;

    /**
     * @return mixed
     */
    public function getRegionCode()
    {
        return $this->region_code;
    }

    /**
     * @param mixed $region_code
     */
    public function setRegionCode($region_code): void
    {
        $this->region_code = $region_code;
    }

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

    public function getManyByRegionCode($code)
    {
        $departments = Dao::getMany(self::class, [
            'region_code' => $code
        ]);

        return $departments;
    }

}