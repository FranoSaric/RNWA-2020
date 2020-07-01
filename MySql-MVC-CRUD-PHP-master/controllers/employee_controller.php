<?php
  class EmployeeController {
    public function index() {
      // we store all the posts in a variable
      $employee = Employee::all();
      require_once('views/employee/index.php');
    }
    
    public function createIndex() {
      require_once('views/employee/create.php');
    }

    public function show() {
      if (!isset($_GET['employeeNumber']))
        return call('pages', 'error');
      $employee = Employee::find($_GET['employeeNumber']);
      require_once('views/employee/show.php');
    }
	public function deleteEmployee() {
  
      if (!isset($_GET['employeeNumber ']))
        return call('pages', 'error');

      
      $employee = Employee::deleteEmployee($_GET['employeeNumber']);
      require_once('views/employee/delete.php');
    }

   
    public function employeeCreate() {
        
      $lastName=$_POST['lastName'];
      $firstName = $_POST['firstName'];
      $extension= $_POST['extension'];
      $email= $_POST['email'];
      $officeCode= $_POST['officeCode'];
      $reportsTo= $_POST['reportsTo'];
      $jobTitle= $_POST['jobTitle'];


      $employee = Employee::create($lastName,$firstName,$extension,$email,$officeCode,$reportsTo,$jobTitle);
     
    }

    public function employeeEdit() {
      
      $employeeNumber=$_POST['employeeNumber'];
      $lastName=$_POST['lastName'];
      $firstName = $_POST['firstName'];
      $extension= $_POST['extension'];
      $email= $_POST['email'];
      $officeCode= $_POST['officeCode'];
      $reportsTo= $_POST['reportsTo'];
      $jobTitle= $_POST['jobTitle'];


      $employee = Employee::edit($employeeNumber,$lastName,$firstName,$extension,$email,$officeCode,$reportsTo,$jobTitle);
     
    }

    
  }
?>