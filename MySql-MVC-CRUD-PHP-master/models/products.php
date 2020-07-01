<?php
  class Products  {

    public $productCode;
    public $productName;
    public $productLine;
    public $productScale;
    public $productVendor;
    public $productDescription;
    public $quantityInStock;
    public $buyPrice;
    public $MSRP;



    public function __construct($productCode=null, $productName=null,$productLine=null,$productScale=null,$productVendor=null,$productDescription=null,$quantityInStock=null,$buyPrice=null,$MSRP=null) {
      $this->productCode = $productCode;
      $this->productName  = $productName;
      $this->productLine  = $productLine;
      $this->productScale  = $productScale;
      $this->productVendor  = $productVendor;
      $this->productDescription  = $productDescription;
      $this->quantityInStock  = $quantityInStock;
      $this->buyPrice  = $buyPrice;
      $this->MSRP  = $MSRP;


    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM products');

      foreach($req->fetchAll() as $proizvod) {
        $list[] = new Products($proizvod['productCode'],$proizvod['productName'], $proizvod['productLine'],$proizvod['productScale'],$proizvod['productVendor'],$proizvod['productDescription'],$proizvod['quantityInStock'],$proizvod['buyPrice'],$proizvod['MSRP']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      $req = $db->prepare('SELECT * FROM products WHERE productCode=:id');
      $req->execute(array('id' => $id));
      $proizvod = $req->fetch();

      return new Products($proizvod['productCode'],$proizvod['productName'], $proizvod['productLine'],$proizvod['productScale'],$proizvod['productVendor'],$proizvod['productDescription'],$proizvod['quantityInStock'],$proizvod['buyPrice'],$proizvod['MSRP']);
    }
	
	public static function deleteproduct($id) {
      $db = Db::getInstance();
     
	  $sql="DELETE FROM products WHERE productCode ='$id'";

	    if ($db->query($sql) == TRUE){
		 call('products', 'index');
	     }
		  else {
			   call('pages', 'error');
		  }
    }
	  


    public static function create($productCode,$productName,$productLine,$productScale,$productVendor,$productDescription,$quantityInStock,$buyPrice,$MSRP) {
      $db = Db::getInstance();
      $req = $db->prepare('INSERT INTO  products (productCode,productName , productLine,productScale,productVendor,productDescription,quantityInStock,buyPrice,MSRP) VALUES(:productCode,:productName,:productLine,:productScale,:productVendor,:productDescription,:quantityInStock,:buyPrice,:MSRP)');
  
       $req->execute(array('productCode'=>$productCode, 'productName'=> $productName,'productLine' => $productLine,'productScale' => $productScale,'productVendor' => $productVendor,'productDescription' => $productDescription,'quantityInStock' => $quantityInStock,'buyPrice' => $buyPrice,'MSRP' => $MSRP));
      if($req){
        call('products', 'index');
  

        }else{
            call('pages', 'error');
        }
        }

    public static function edit($productCode,$productName,$productLine,$productScale,$productVendor,$productDescription,$quantityInStock,$buyPrice,$MSRP) {
      $db = Db::getInstance();
        $req = $db->prepare("UPDATE products SET productName=:productName1, productLine=:productLine1,productScale=:productScale1,productVendor=:productVendor1,productDescription=:productDescription1,quantityInStock=:quantityInStock1, buyPrice=:buyPrice1, MSRP=:MSRP1 where productCode=:productCode1");
        $req->execute(array('productCode1'=>$productCode,'productName1' => $productName, 'productLine1'=>$productLine, 'productScale1'=>$productScale, 'productVendor1'=>$productVendor,'productDescription1'=>$productDescription, 'quantityInStock1'=>$quantityInStock, 'buyPrice1'=>$buyPrice, 'MSRP1'=>$MSRP));
        if($req){
        call('products', 'index');
  

        }else{
            call('pages', 'error');
        }

        }
    }
?>