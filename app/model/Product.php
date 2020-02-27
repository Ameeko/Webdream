<?php

namespace Store;

class Product {

    private $generalProduct;
    private $quantity;

    /**
     * Product constructor.
     * @param $generalProduct
     * @param $quantity
     */
    public function __construct(GeneralProduct $generalProduct, $quantity) {
        $this->generalProduct = $generalProduct;
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getQuantity() {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
    
    /**
     * @return \Store\GeneralProduct
     */
    public function getGeneralProduct() {
        return $this->generalProduct;
    }

    public function __toString() {
        $productData = '<div class="container">';
        $productData.= '<b>Mennyiség: '.$this->quantity.' db.</b>';
        $productData.= $this->generalProduct;
        $productData.= '</div>';
        return $productData;        
    }
    
}
