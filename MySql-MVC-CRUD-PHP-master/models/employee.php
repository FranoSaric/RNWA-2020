<?php
  class Employee  {

    public $employeeNumber ;
    public $lastName;
    public $firstName;
    public $extension;
    public $email;
    public $officeCode;
    public $reportsTo;
    public $jobTitle;




    public function __construct($employeeNumber=null, $lastName=null,$firstName=null,$extension=null,$email=null,$officeCode=null,$reportsTo=null,$jobTitle=null) {
      $this->employeeNumber = $employeeNumber;
      $this->lastName  = $lastName;
      $this->firstName  = $firstName;
      $this->extension  = $extension;
      $this->email  = $email;
      $this->officeCode  = $officeCode;
      $this->reportsTo  = $reportsTo;
      $this->jobTitle  = $jobTitle;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM employees');

      foreach($req->fetchAll() as $uposleni) {
        $list[] = new Employee($uposleni['employeeNumber'],$uposleni['lastName'], $uposleni['firstName'],$uposleni['extension'],$uposleni['email'],$uposleni['officeCode'],$uposleni['reportsTo'],$uposleni['jobTitle']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      $req = $db->prepare('SELECT * FROM employees WHERE employeeNumber =:id');
      $req->execute(array('id' => $id));
      $uposleni = $req->fetch();

      return new Employee($uposleni['employeeNumber'],$uposleni['lastName'], $uposleni['firstName'],$uposleni['extension'],$uposleni['email'],$uposleni['officeCode'],$uposleni['reportsTo'],$uposleni['jobTitle']);
    }
	
	public static function deleteEmployee($id) {
      $db = Db::getInstance();
     
	  $sql="DELETE FROM employees WHERE employeeNumber ='$id'";

	    if ($db->query($sql) == TRUE){
		 call('employee', 'index');
	     }
		  else {
			   call('pages', 'error');
		  }
    }
	  


    public static function create($lastName,$firstName,$extension,$email,$officeCode,$reportsTo,$jobTitle) {
      $db = Db::getInstance();
      $req = $db->prepare('INSERT INTO  employees (lastName, firstName,extension,email,officeCode,reportsTo,jobTitle) VALUES(:lastName,:firstName,:extension,:email,:officeCode,:reportsTo,:jobTitle)');
  
      $req->execute(array('lastName'=>$lastName, 'firstName'=> $firstName,'extension' => $extension,'email' => $email,'officeCode' => $officeCode,'reportsTo' => $reportsTo,'jobTitle' => $jobTitle));
      
      if($req){
        call('employee', 'index');
  

        }else{
            call('pages', 'error');
        }
        }

    public static function edit($employeeNumber,$lastName,$firstName,$extension,$email,$officeCode,$reportsTo,$jobTitle) {
      $db = Db::getInstance();
        $req = $db->prepare("UPDATE employees SET lastName=:lastName1, firstName=:firstName1,extension=:extension1,email=:email1,officeCode=:officeCode1,reportsTo=:reportsTo1, jobTitle=:jobTitle1 where employeeNumber=:employeeNumber1");
        $req->execute(array('employeeNumber1'=>$employeeNumber,'lastName1' => $lastName, 'firstName1'=>$firstName, 'extension1'=>$extension, 'email1'=>$email,'officeCode1'=>$officeCode, 'reportsTo1'=>$reportsTo, 'jobTitle1'=>$jobTitle));
        if($req){
        call('employee', 'index');
  

        }else{
            call('pages', 'error');
        }

        }
    }
?>