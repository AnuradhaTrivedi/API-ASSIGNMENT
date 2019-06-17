<?php
class Product{
    
    //database connection and table name
    private $conn;
    private $table_name = "products";
    
    //object properties
    public $id;
    public $Title;
    public $image_url;
    public $price;
    public $category;
    public $Details;
    
    
    //constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    //read products
    function readAll(){
        
        //select all query
       // $query = "SELECT c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
       // FROM 
      //  " . $this->table_name . " p
      /*  LEFT JOIN 
        categories c 
        ON p.category_id = c.id
        ORDER BY 
        p.created DESC";*/
        $query="SELECT * FROM products WHERE category='plant'";
        //prepare query statement
        $stmt = $this->conn->prepare($query);
        
        //execute query
        $stmt->execute();
        return $stmt;
    }
}

?>