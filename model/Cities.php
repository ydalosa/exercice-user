<?php

namespace App\model;

use App\core\Dao;

class Cities extends \App\core\Model
{
    use CommonFrance;
    private $departement_code;
    private $insee_code;
    private $zip_code;
    private $gps_lat;
    private $gps_lng;


    /**
     * @return mixed
     */
    public function getDepartementCode()
    {
        return $this->departement_code;
    }

    /**
     * @param mixed $departement_code
     */
    public function setDepartementCode($departement_code): void
    {
        $this->departement_code = $departement_code;
    }

    /**
     * @return mixed
     */
    public function getInseeCode()
    {
        return $this->insee_code;
    }

    /**
     * @param mixed $insee_code
     */
    public function setInseeCode($insee_code): void
    {
        $this->insee_code = $insee_code;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zip_code;
    }

    /**
     * @param mixed $zip_code
     */
    public function setZipCode($zip_code): void
    {
        $this->zip_code = $zip_code;
    }

    /**
     * @return mixed
     */
    public function getGpsLat()
    {
        return $this->gps_lat;
    }

    /**
     * @param mixed $gps_lat
     */
    public function setGpsLat($gps_lat): void
    {
        $this->gps_lat = $gps_lat;
    }

    /**
     * @return mixed
     */
    public function getGpsLng()
    {
        return $this->gps_lng;
    }

    /**
     * @param mixed $gps_lng
     */
    public function setGpsLng($gps_lng): void
    {
        $this->gps_lng = $gps_lng;
    }

    public function getManyByDepartmentCode($code)
    {
        $cities = Dao::getMany(self::class, [
            'department_code' => $code
        ]);

        return $cities;
    }

}