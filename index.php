<?php
include "vendor/autoload.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>WebDream Magyarország Kft. - Backend fejlesztői otthoni feladat</title>
        <style>
            h1 {
                font-size: 17px;                
            }
            
            h2 {
                font-size: 15px;                
            }
            .container {
                margin: 0 0 5px 0;
                border: 1px solid #bbb;
            }
            
            .box {
                margin: 0 5px 5px 0;
                background-color: #eee;
                width: 210px;
                height: 150px;
                display: inline-flex;
            }
            .boxLarge {
                margin: 0 5px 5px 0;
                background-color: #eee;
            }            
            .subbox {
                padding: 5px 5px 5px 0;
                background-color: #ccc;
                display: block;               
            }
            
            ul {
                list-style-type: none;
                margin: 5px;
                padding: 5px;
                    
            }
            ul li {
                font-size: 13px;
            }
            .error {
                background-color: #f00;
                color: #fff;
                padding: 3px;
            }
        </style>
    </head>
    <body>
        <h1>WebDream Magyarország Kft. - Backend fejlesztői otthoni feladat</h1>
        
            <?php 
            
            Store\Test::test1();
            
            Store\Test::test2(); 
            
            ?>
        
    </body>
</html>