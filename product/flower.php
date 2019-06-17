<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//include database and object files
include_once '../config/database.php';
include_once '../objects/flowerobj.php';

//instantiate database and product object
$database = new Databse();
$db = $database->getConnection();

//initialize object
$flowerobj = new Product($db);

//query products
$stmt = $flowerobj->readAll();
$num = $stmt->rowCount();

//check if more than 0 record is found
if($num>0){
    
    $data = "";
    $x = 1;
    
    //retreive table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        //extract row
        extract($row);
        
        $data .= '{';
        $data .= '"id":"' . $id . '", ';
        $data .= '"Title":"' . $Title . '",';
        $data .= '"Details":"' . html_entity_decode($Details) . '",';
        $data .= '"price":' . $price . ',';
       $data .= '"category":' . $category . ',';
       $data .= '"image_url":"' . $image_url . '"';
        $data .= '}';
        
        $data .= $x<$num ? ',' : '';
        $x++;
    }
    //json format output
    echo "[{$data}]";
}
else{
    echo '[{}]';
}

?>