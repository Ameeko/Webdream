<?php


namespace Store;

class Warehouse {

    private $fullStockQuantity = 0;
    private $actualStockQuantity = 0;
    private $stores = array();

    /**
     * Warehouse constructor.
     */
    public function __construct() {
        
    }

    /**
     * @param int $storeCapacity
     */    
    public function addStore($store, $storeCapacity) {
        $this->fullStockQuantity = $this->fullStockQuantity + $storeCapacity;
        array_push($this->stores, $store);
    }
    
    /**
     * @param int $storeCapacity
     */    
    public function increaseStock($quantity) {
        $this->actualStockQuantity = $this->actualStockQuantity + $quantity;
    }    

    /**
     * @param int $storeCapacity
     */    
    public function decreaseStock($quantity) {
        $this->actualStockQuantity = $this->actualStockQuantity - $quantity;
    }    

    
    /**
     * @return int
     */    
    public function getFullCapacity() {
        return $this->fullStockQuantity;
    }
    
    /**
     * @return int
     */    
    public function getActualCapacity() {
        return $this->fullStockQuantity - $this->actualStockQuantity;
    }
    
    /**
     * @return array
     */    
    public function getStores() {
        return $this->stores;
    }
    
    
}
