<?php

/*
 * Feladat:
 * Tervezz egy osztályhierarchiát, amivel modellezni tudsz:
 * márkát (márkanév, minőségkategória (1 - 5), ...),
 */

namespace Store;

class Brand {

    private $brandName;
    private $producingCountry;
    private $qualityCategory;

     /**
     * Brand constructor.
     * @param $brandName
     * @param $producingCountry
     * @param $qualityCategory
     */
    function __construct($brandName, $producingCountry, $qualityCategory) {
        
        $this->brandName = $brandName;
        $this->producingCountry = $producingCountry;        
        $this->qualityCategory = $qualityCategory;
        
    }

    /**
     * @return mixed
     */    
    public function getBrandName() {
        return $this->brandName;
    }
    
    /**
     * @return mixed
     */    
    public function getProducingCountry() {
        return $this->producingCountry;
    }    

    /**
     * @return mixed
     */    
    public function getQualityCategory() {
        return $this->qualityCategory;
    }
    
    public function __toString() {
        $brandData = '<span class="subbox">';
        $brandData.= 'Brand: '.$this->brandName.' ['.$this->producingCountry.' / '.$this->qualityCategory.']';
        $brandData.= '</span>';
        return $brandData;        
        
    }    
    
}