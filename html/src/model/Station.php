<?php
/**
 * Created by PhpStorm.
 * User: jesse-gall
 * Date: 2/4/19
 * Time: 10:44 PM
 */

include_once '../helper.php';

class Station
{

    private $id;
    private $country;

    public function __construct($data)
    {
        $this->id      = $data['id'];
        $this->country = $data['country'];
    }

    /**
     * Returns the data of the station
     *
     * @param null $from
     * @param null $to
     * @return array
     */
    public function data($date, $from = null, $to = null): array
    {
        return station_data($date, $this->id, $from, $to);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }
}