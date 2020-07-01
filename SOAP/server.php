<?php

class server
{
    private $con;
    public function __construct()
    {
        $this->con=(is_null($this->con)) ? self::connect() : $this->con;
       }

    static function connect()
       {
           $con=mysqli_connect("localhost", "root","","classicmodels");
           //$db=mysqli_select_db('classicmodels', $con);
           if (mysqli_connect_errno($con)){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
             }
           return $con;
       }

    public function getPrice($id_array)
    {
        $sql="SELECT priceEach FROM orderdetails WHERE orderNumber='".$id_array."'";
        $qry=mysqli_query($this->con, $sql);
        $res=mysqli_fetch_array($qry,MYSQLI_ASSOC);
        $sql2="SELECT quantityOrdered FROM orderdetails WHERE orderNumber='".$id_array."'";
        $qry2=mysqli_query($this->con, $sql2);
        $res2=mysqli_fetch_array($qry2,MYSQLI_ASSOC);
        return  ("Ukupna cijena: ".$res['priceEach']*$res2['quantityOrdered']);
    }   
    
}

$params=array('uri'=>'SOAP/server.php');
$server = new SoapServer(NULL, $params);
$server->setClass('server');
$server->handle();


?>