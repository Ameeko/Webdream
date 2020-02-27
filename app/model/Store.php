<?php

/*
 * A vállalat több telephelyen rendelkezik raktárral. 
 * Tervezz egy osztályhierarchiát, amivel modellezni tudsz:
 * raktárat (megnevezés, cím, kapacitás, raktárkészlet, ...)
 */

namespace Store;

class Store {

    private $storeName;
    private $storeAddress;
    private $storeTelephone;
    private $storeCapacity;
    private $products = array();
    private $stockQuantity = 0;
    private $warehouse;

    /**
     * Store constructor.
     * @param array $products
     * @param $storeName
     * @param $storeAddress
     * @param $storeTelephone
     * @param $storeCapacity
     */
    public function __construct($storeName, $storeAddress, $storeTelephone, $storeCapacity, $warehouse, array $products) {
        $this->warehouse = $warehouse;
        $this->warehouse->addStore($this,$storeCapacity);
        $this->storeName = $storeName;
        $this->storeAddress = $storeAddress;
        $this->storeTelephone = $storeTelephone;
        $this->storeCapacity = $storeCapacity;
        $this->products = $products;
        
        
    }
    
    public function insertProductToStore(Product $product) {
        
        $actualItem = $product->getGeneralProduct();        
        $quantity = $product->getQuantity();
        $fullCapacity = $this->warehouse->getFullCapacity();
        $actualCapacity = $this->warehouse->getActualCapacity();
        

        
        # Check full capacity
        if($actualCapacity==0 || $actualCapacity < $quantity){
            throw new \Exception('A termék raktárba rakása sikertelen - nincs elég teljes kapacitás.');
        }else{
            # Check stores
            $stores = $this->warehouse->getStores();
            $free = 0;
            
            foreach ($stores as $key => $store) {
                $insertQuantity = $quantity;
                $free = $store->storeCapacity - $store->stockQuantity;
                if($free > 0){
                    if($free < $quantity){
                        $insertQuantity = $free;
                    }
                    # this store has space
                    $inStore = false;
                    foreach ($store->products as $productElement) {
                        $productQuantity = $productElement->getQuantity();
                        $generalProduct = $productElement->getGeneralProduct();
                        # Check if it is in the store
                        if ($actualItem->getItemNumber() === $generalProduct->getItemNumber()) {
                            # if it is, we will increase the quantity
                            $productElement->setQuantity($insertQuantity + $productQuantity);
                            $inStore = true;
                        }                        
                    }
                    if ($inStore == false) {
                        # if it is not there, we put it in
                        $productSep = clone $product;
                        $productSep->setQuantity($insertQuantity);
                        array_push($store->products, $productSep);
                        $this->warehouse->increaseStock($insertQuantity);
                    }
                    $store->stockQuantity = $store->stockQuantity + $insertQuantity;
                    $quantity = $quantity - $insertQuantity;
                    if($quantity == 0){
                        break;
                    }
                    
                }
            }            

        }
        
    }
    
    public function takeOutProductFromStore(Product $listItem) {
        
        $actualQuantity = 0;
        $correctQuantity = true;
        $inStore = false;
        
        $actualItem = $listItem->getGeneralProduct();
        $quantity = $listItem->getQuantity();

        # Check quantity in store
        if ($this->stockQuantity >= $quantity) {

            foreach ($this->products as $key => $element) {
                
                $product = $element->getGeneralProduct();
                $productQuantity = $element->getQuantity();
                
                if ($product->getItemNumber() === $actualItem->getItemNumber()) {
                    $inStore = true;
                    $actualQuantity = $productQuantity;
                    if ($productQuantity - $quantity < 0) {
                        $correctQuantity = false;
                    } else {
                        if ($productQuantity - $quantity == 0) {
                            unset($this->products[$key]);
                        } else {
                            $element->setQuantity($productQuantity - $quantity);

                            $this->stockQuantity = $this->stockQuantity - $quantity;
                            
                            $this->warehouse->decreaseStock($quantity);
                        }
                    }
                }
            }

           
        } else {
            throw new \Exception('Termék kivétele sikertelen - a raktárban nincs ennyi termék.');
        }
        
        if (!$correctQuantity) {
            throw new \Exception('Termék kivétele sikertelen - hibás mennyiség.');
        }

        if (!$inStore) {
            throw new \Exception('Termék kivétele sikertelen - ilyen termék nincs a raktárban.');
        }         
    }    

    /**
     * @return mixed
     */
    public function getStoreName() {
        return $this->storeName;
    }

    /**
     * @param mixed $storeName
     */
    public function setStoreName($storeName) {
        $this->storeName = $storeName;
    }
    
    /**
     * @return mixed
     */
    public function getStoreAddress() {
        return $this->storeAddress;
    }

    /**
     * @param mixed $storeAddress
     */
    public function setStoreAddress($storeAddress) {
        $this->storeAddress = $storeAddress;
    }
    
    /**
     * @return mixed
     */
    public function getStoreTelephone() {
        return $this->storeTelephone;
    }

    /**
     * @param mixed $storeTelephone
     */
    public function setStoreTelephone($storeTelephone) {
        $this->storeTelephone = $storeTelephone;
    }
    
    /**
     * @return int
     */
    public function getStoreCapacity() {
        return $this->storeCapacity;
    }

    /**
     * @return array
     */
    public function getProducts() {
        return $this->products;
    }
    
    public function __toString() {
        $storeData = '<div class="boxLarge"><ul>';
        $storeData.= '<li><b>'.$this->storeName.'</b> ['.$this->storeAddress.']</li>';
        $storeData.= '<li>'.$this->storeTelephone.'</li>';
        $storeData.= '<li><span>Kapacitás:</span> '.$this->storeCapacity.'</li>';
        $storeData.= '<li><span>Teljes kapacitás:</span> '.$this->warehouse->getFullCapacity().'/'.$this->warehouse->getActualCapacity().'</li>';
        $storeData.= '<li><span>Raktárkészlet:</span>';
        $storeData.= '<ul>';
        if(count($this->products)>0){
            foreach ($this->products as $product) {
                $storeData.= '<li>'.$product.'</li>';
            }
        }else{
            $storeData.= '<li>Üres</li>';
        }
        $storeData.= '</ul></li></ul></div>';
        return $storeData;
    }    

}
