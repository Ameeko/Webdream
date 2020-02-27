<?php

/*
 * Feladat:
 * Tervezz egy osztályhierarchiát, amivel modellezni tudsz:
 * terméket (cikkszám, megnevezés, ár, márka, ...).
 */

namespace Store;

class GeneralProduct {

    protected $itemNumber;
    protected $generalProductName;
    protected $generalProductPrice;
    protected $brand;

    /**
     * GeneralProduct constructor.
     * @param $itemNumber
     * @param $generalProductName
     * @param $productPrice
     * @param $brand
     */
    public function __construct($itemNumber, $generalProductName, $generalProductPrice, Brand $brand) {
        $this->itemNumber = $itemNumber;
        $this->generalProductName = $generalProductName;
        $this->generalProductPrice = $generalProductPrice;
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getItemNumber() {
        return $this->itemNumber;
    }

    /**
     * @param mixed $itemNumber
     */
    public function setItemNumber($itemNumber) {
        $this->itemNumber = $itemNumber;
    }

    /**
     * @return mixed
     */
    public function getGeneralProductPrice() {
        return $this->generalProductPrice;
    }

    /**
     * @param mixed $productPrice
     */
    public function setProductPrice($productPrice) {
        $this->generalProductPrice = $generalProductPrice;
    }

    /**
     * @return \Store\Brand
     */
    public function getBrand() {
        return $this->brand;
    }

    /**
     * @param \Store\Brand $brand
     */
    public function setBrand(Brand $brand) {
        $this->brand = $brand;
    }
    
    public function __toString() {
        return $this->itemNumber.'/'.$this->generalProductName.'/'.$this->generalProductPrice.'/'.$this->brand;
    }
    

}



