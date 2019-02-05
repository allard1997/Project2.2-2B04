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
    private $longitude;
    private $elevation;
    private $name;

    public function __construct($data)
    {
        $this->id        = $data['id'];
        $this->country   = $data['country'];
        $this->latitude  = $data['latitude'];
        $this->longitude = $data['longitude'];
        $this->elevation = $data['elevation'];
        $this->name      = $data['name'];
    }

    /**
     * Returns the data of the station
     *
     * @param $date
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

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return mixed
     */
    public function getElevation()
    {
        return $this->elevation;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}