<?php
  class ProductsController {
    public function index() {
      // we store all the posts in a variable
      $products = Products::all();
      require_once('views/products/index.php');
    }
    
    public function createIndex() {
      require_once('views/products/create.php');
    }
    public function show() {
      if (!isset($_GET['productCode']))
        return call('pages', 'error');
      $products = Products::find($_GET['productCode']);
      require_once('views/products/show.php');
    }
	public function deleteproduct() {
  
      if (!isset($_GET['productCode']))
        return call('pages', 'error');

      
      $products = Products::deleteproduct($_GET['productCode']);
      require_once('views/products/delete.php');
    }

   
    public function productCreate() {
        
      $productCode=$_POST['productCode'];
      $productName = $_POST['productName'];
      $productLine= $_POST['productLine'];
      $productScale= $_POST['productScale'];
      $productVendor= $_POST['productVendor'];
      $productDescription= $_POST['productDescription'];
      $quantityInStock= $_POST['quantityInStock'];
      $MSRP= $_POST['MSRP'];
      $buyPrice= $_POST['buyPrice'];

      $products = Products::create($productCode,$productName,$productLine,$productScale,$productVendor,$productDescription,$quantityInStock,$buyPrice,$MSRP);
     
    }

    public function productEdit() {
        
      $productCode=$_POST['productCode'];
      $productName = $_POST['productName'];
      $productLine= $_POST['productLine'];
      $productScale= $_POST['productScale'];
      $productVendor= $_POST['productVendor'];
      $productDescription= $_POST['productDescription'];
      $quantityInStock= $_POST['quantityInStock'];
      $MSRP= $_POST['MSRP'];
      $buyPrice= $_POST['buyPrice'];

      $products = Products::edit($productCode,$productName,$productLine,$productScale,$productVendor,$productDescription,$quantityInStock,$buyPrice,$MSRP);
     
    }

    
  }
?>