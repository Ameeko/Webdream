<?php

namespace Store;

class Test {

    public function __construct() {
        
    }

    public static function test1() {
        
        
        echo "<h2>Test 1.:</h2>";
        
        echo "<h2>Három raktár létrehozása termékek nélkül:</h2>";
        
        $warehouse = new Warehouse();
        
        $store1 = new Store('Budapesti raktár','1034 Budapest, Bécsi út 1.'  ,'+36-1-555-7777',250,$warehouse,array());
        echo $store1;
        
        $store2 = new Store('Soproni raktár'  ,'9400 Sopron, Ilona utca 22.' ,'+36-1-444-5467',80,$warehouse,array());
        echo $store2;
        
        $store3 = new Store('Szegedi raktár'  ,'6700 Szeged, Géza utca 91.'  ,'+36-1-898-1135',120,$warehouse,array());       
        echo $store3;        

        echo "<h2>Termékek létrehozása:</h2>";
        
        $drone1 = new Drone('DJP-91100','Phantom 4',              249000, new Brand('DJI',     'China',  4), 35, 4000, 75);
        $drone2 = new Drone('DJM-65070','Mavic 2 Pro',            488900, new Brand('DJI',     'China',  4), 20, 3000, 70);
        $drone3 = new Drone('DJM-65100','Mavic 2 Enterprise',     759000, new Brand('DJI',     'China',  5), 23, 3500, 75);
        $drone4 = new Drone('IFD-20090','DC3 HD Quad',            139900, new Brand('iFlight', 'China',  3), 12, 1000, 140);
        
        $camera1 = new ActionCamera('GPH-56008','Hero 8 Black',   134000, new Brand('GoPro',   'USA',    5), '4K', true);
        $camera2 = new ActionCamera('GPH-56006','Hero 6',         127900, new Brand('GoPro',   'USA',    4), '1440p', true);
        $camera3 = new ActionCamera('SOF-30009','FDR-X3000',      210000, new Brand('Sony',    'Japan',  5), '4K', false);         
        
        echo $drone1;
        echo $drone2;
        echo $drone3;
        echo $drone4;
        echo $camera1;
        echo $camera2;
        echo $camera3;

        echo "<h2>Berakunk az első raktárba 20 db-ot az első termékből.</h2>";
        echo "<h2>Berakunk az első raktárba 10 db-ot az második termékből.</h2>";
        echo "<h2>Berakunk az első raktárba 80 db-ot az harmadik termékből.</h2>";
        echo "<h2>A harmadik raktár üres marad.</h2>";
        
        
        try {
            $store1->insertProductToStore(new Product($drone1, 20));
            $store1->insertProductToStore(new Product($drone2, 10));
            $store1->insertProductToStore(new Product($drone3, 80));
        } catch (\Exception $e) {
            echo '<span class="error">'.$e->getMessage().'</span>';
        }         
        

        
        echo "<h2>Raktárak listázása:</h2>";
        
        echo $store1;
        echo $store2;
        echo $store3;
        
        echo "<h2>Kiveszünk az első raktárból 40 db-ot a harmadik termékből.</h2>";
        
        try {        
            $store1->takeOutProductFromStore(new Product($drone3, 40));
        } catch (\Exception $e) {
            echo '<span class="error">'.$e->getMessage().'</span>';
        }             
        
        echo "<h2>Raktárak listázása:</h2>";
        
        echo $store1;
        echo $store2;
        echo $store3;    
        
        echo '<hr>';
        
    }

    
    public static function test2() {
        
        
        echo "<h2>Test 2.:</h2>";
        
        echo "<h2>Két raktár létrehozása termékek nélkül, 10-es kapacitással:</h2>";
        
        
        $warehouse = new Warehouse();
        
        $store1 = new Store('Budapesti raktár','1034 Budapest, Bécsi út 1.', '+36-1-555-7777', 10, $warehouse, array());
        echo $store1;
        
        $store2 = new Store('Soproni raktár'  ,'9400 Sopron, Ilona utca 22.', '+36-1-444-5467', 10, $warehouse, array());
        echo $store2;
        


        echo "<h2>Termékek létrehozása:</h2>";
        
        $drone1 = new Drone('DJP-91100','Phantom 4',              249000, new Brand('DJI',     'China',  4), 35, 4000, 75);
        $drone2 = new Drone('DJM-65070','Mavic 2 Pro',            488900, new Brand('DJI',     'China',  4), 20, 3000, 70);
        $drone3 = new Drone('DJM-65100','Mavic 2 Enterprise',     759000, new Brand('DJI',     'China',  5), 23, 3500, 75);
        $drone4 = new Drone('IFD-20090','DC3 HD Quad',            139900, new Brand('iFlight', 'China',  3), 12, 1000, 140);
        
        $camera1 = new ActionCamera('GPH-56008','Hero 8 Black',   134000, new Brand('GoPro',   'USA',    5), '4K', true);
        $camera2 = new ActionCamera('GPH-56006','Hero 6',         127900, new Brand('GoPro',   'USA',    4), '1440p', true);
        $camera3 = new ActionCamera('SOF-30009','FDR-X3000',      210000, new Brand('Sony',    'Japan',  5), '4K', false);         

        echo "<h2>Berakunk az első raktárba 5 db-ot az első termékből.</h2>";
        
        try {
            $store1->insertProductToStore(new Product($drone1, 5));
        } catch (\Exception $e) {
            echo '<span class="error">'.$e->getMessage().'</span><br>';
        }  

        echo $store1;
        echo $store2;
        
        echo "<h2>Megpróbálunk az első raktárból 100 terméket kivenni.</h2>";
        
        try {
            $store1->takeOutProductFromStore(new Product($drone1, 50));
        } catch (\Exception $e) {
            echo '<span class="error">'.$e->getMessage().'</span><br>';
        }          


        echo "<h2>Megpróbálunk berakni a második raktárba 100 db-ot a második termékből (több, mint a raktárak teljes kapacitása)</h2>";        
        try {
            $store2->insertProductToStore(new Product($drone2, 100));
        } catch (\Exception $e) {
            echo '<span class="error">'.$e->getMessage().'</span><br>';
        } 
        
        echo "<h2>Megpróbálunk berakni az első raktárba 15 db-ot a második termékből (több, mint az első raktár kapacitása, de a két raktárban pont elfér)</h2>";            
        try {    
            $store1->insertProductToStore(new Product($drone2, 15));
        } catch (\Exception $e) {
            echo '<span class="error">'.$e->getMessage().'</span><br>';
        }        
        

 
        
        echo "<h2>Raktárak listázása:</h2>";
        
        echo $store1;
        echo $store2;
        
        
        
        
        
        
    }    
    


}
