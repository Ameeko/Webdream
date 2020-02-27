<?php

/*
 * Feladat:
 * Készíts 2-3 termék osztályt, mely tetszőleges cikket reprezentál. 
 * Az alap tulajdonságokon kívül mindegyiket bővítsd legalább egy egyedi tulajdonsággal.
 */

namespace Store;

class Drone extends GeneralProduct {

    private $flightTime;
    private $maximumRange;
    private $maximumSpeed;

    /**
     * Drone constructor.
     * @param $flightTime
     * @param $maximumRange
     * @param $maximumSpeed
     */
    public function __construct($itemNumber, $generalProductName, $generalProductPrice, Brand $brand, $flightTime, $maximumRange, $maximumSpeed) {
        parent::__construct($itemNumber, $generalProductName, $generalProductPrice, $brand);
        $this->flightTime = $flightTime;
        $this->maximumRange = $maximumRange;
        $this->maximumSpeed = $maximumSpeed;
    }

    /**
     * @return mixed
     */
    public function getFlightTime() {
        return $this->flightTime;
    }

    /**
     * @return mixed
     */
    public function getMaximumRange() {
        return $this->maximumRange;
    }

    /**
     * @return mixed
     */
    public function getMaximumSpeed() {
        return $this->maximumSpeed;
    }

    public function __toString() {
        $productData = '<div class="box"><ul>';
        $productData.= '<li><b>'.$this->generalProductName.'</b> ['.$this->itemNumber.']</li>';
        $productData.= '<li>'.$this->generalProductPrice.' Ft</li>';
        $productData.= '<li>'.$this->brand.'</li>';
        $productData.= '<li>Repülési idő: '.$this->flightTime.' perc</li>';
        $productData.= '<li>Hatótávolság: '.$this->maximumRange.' m</li>';
        $productData.= '<li>Maximum sebesség: '.$this->maximumSpeed.' km/h</li>';
        $productData.= '</ul></div>';
        return $productData;
    }      
}