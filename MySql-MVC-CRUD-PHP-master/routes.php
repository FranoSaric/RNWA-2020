<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'products':
        require_once('models/products.php');
		$controller = new ProductsController();
      break;
       case 'employee':
        require_once('models/employee.php');
		$controller = new EmployeeController();
      break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('products' 	=> ['index','createIndex','productCreate','show','deleteproduct','productEdit'],
                       'employee'   =>['index','createIndex','employeeCreate','show','deleteEmployee','employeeEdit']
  );

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>