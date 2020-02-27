<?php

/*
 * Feladat:
 * Készíts 2-3 termék osztályt, mely tetszőleges cikket reprezentál. 
 * Az alap tulajdonságokon kívül mindegyiket bővítsd legalább egy egyedi tulajdonsággal.
 */

namespace Store;

class ActionCamera extends GeneralProduct {

    private $resolution;
    private $waterproof;

    /**
     * Laptop constructor.
     * @param $resolution
     * @param $waterproof
     */
    public function __construct($itemNumber, $generalProductName, $generalProductPrice, Brand $brand, $resolution, $waterproof) {
        parent::__construct($itemNumber, $generalProductName, $generalProductPrice, $brand);
        $this->resolution = $resolution;
        $this->waterproof = $waterproof;
    }

    /**
     * @return mixed
     */
    public function getResolution() {
        return $this->resolution;
    }

    /**
     * @return mixed
     */
    public function getWaterproof() {
        return $this->waterproof;
    }
    
    public function __toString() {
        $productData = '<div class="box"><ul>';
        $productData.= '<li><b>'.$this->generalProductName.'</b> ['.$this->itemNumber.']</li>';
        $productData.= '<li>'.$this->generalProductPrice.' Ft</li>';
        $productData.= '<li>'.$this->brand.'</li>';
        $productData.= '<li>Felbontás: '.$this->resolution.'</li>';
        $productData.= '<li>'.($this->waterproof ? 'Vízálló' : 'Nem vízálló').'</li>';
        $productData.= '</ul></div>';
        return $productData;
    }   
}