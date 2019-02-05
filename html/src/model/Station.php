<?php
/**
 * Created by PhpStorm.
 * User: jesse-gall
 * Date: 2/4/19
 * Time: 10:44 PM
 */

include_once 'src/helper.php';

class Station
{

    private $id;
    private $country;
    private $latitude;

    public function __construct($data)
    {
        $this->id       = $data['id'];
        $this->country  = $data['country'];
        $this->latitude = $data['latitude'];
    }

    /**
     * Returns the data of the station
     *
     * @param null $from
     * @param null $to
     * @return array
     */
    public function data($date, $from = null, $to = null)
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