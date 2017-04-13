<?php  session_start(); ?>

<?php
if(isset($_POST['searchCriteria']))   // it checks whether the user clicked search button or not 
{
	include 'searchResults.php';
    
		$price = $_POST['priceSearchSelected'];
		$computerType = $_POST['computerTypeSelected'];
		$weight = $_POST['weightSearchSelected'];
		$memory = $_POST['memorySearchSelected'];
    $processor = $_POST['processorSearchSelected'];
    $measurement = $_POST['measurementSearchSelected'];
		$diskType = $_POST['diskTypeSelected'];
		$diskCapacity = $_POST['diskCapacitySelected'];

	  $results = showDefaults($price, $computerType, $weight, $memory, $processor, $measurement, $diskType, $diskCapacity);
    
    
    //echo $results;
    //echo json_encode($results);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>671 Computers</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/navbar-static-top.css" rel="stylesheet"> 
	<link href="styles.css" rel="stylesheet">
  </head>

  <body>

	<?php
      if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
       {
           header("Location:Login.php");  
       }
	?>
  
    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">671 Computers</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a "">Shop</a></li>
            <li><a href="about.php">About</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
			<li><a href="wishlist.php">Wishlist</a></li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['use'];?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="account.php">Update Info</a></li>
                <li><a href="#">Order History</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <!-- Search Panel -->
     <div class="container">
       <form method="post"  action="">
        <div class="panel-group" id="accordion">
          <div id="SearchPanel" class="panel panel-default">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
              <h5 class="panel-title"> <a class="accordion-toggle"> Search
                <span class="indicator glyphicon glyphicon-chevron-down pull-right"></span></a></h5>
            </div>
            <div class="panel-body collapse" id="collapseOne">
              <div class="col-lg-4 col-md-4">
                Max Price
                <br />
                <div class="form-group">
                  <select class="form-control" id="priceSearch" name="priceSearchSelected">
                    <option>500.00</option>
                    <option>1000.00</option>
                    <option>1500.00</option>
                    <option>2000.00</option>
                  </select>
                </div> <!-- Price Search -->
                <br />
                Computer Type
                <br />
                <div class="form-group">
                  <select class="form-control" id="computerType" name="computerTypeSelected">
                    <option>laptop</option>
                    <option>tablet</option>
                    <option>hybrid</option>
                  </select>
                </div> <!-- Computer Type Search -->
              </div>
              <div class="col-lg-4 col-md-4">
                Max Weight in Pounds (lbs)
                <br />
                <div class="form-group">
                  <select class="form-control" id="weightSearch" name="weightSearchSelected">
                    <option>1</option>
                    <option>5</option>
                    <option>10</option>
                  </select>
                </div> <!-- Weight Search -->
                <br />
                Minimum  Memory in Gigabyte (GB)
                <br />
                <div class="form-group">
                  <select class="form-control" id="memorySearch" name="memorySearchSelected">
                    <option>2</option>
                    <option>4</option>
                    <option>6</option>
                    <option>8</option>
                    <option>16</option>
                    <option>32</option>
                  </select>
                </div> <!-- Memory Search -->
                <br />
                Minimum Processor Speed in Gigahertz (GHz)
                <br />
                <div class="form-group">
                  <select class="form-control" id="processorSearch" name="processorSearchSelected">
                    <option>1.0</option>
                    <option>1.5</option>
                    <option>2.0</option>
                    <option>2.5</option>
                    <option>3.0</option>
                  </select>
                </div> <!-- Processor Search -->
              </div>
              <div class="col-lg-4 col-md-4">
                Max Measurement in Inches (In)
                <br />
                <div class="form-group">
                  <select class="form-control" id="measurementSearch" name="measurementSearchSelected">
                    <option>8</option>
                    <option>10</option>
                    <option>12</option>
                    <option>14</option>
                    <option>15</option>
                  </select>
                </div> <!-- Measurement Search -->
                Disk Type
                <br />
                <div class="form-group">
                  <select class="form-control" id="diskType" name="diskTypeSelected">
                    <option>hard drive</option>
                    <option>SSD</option>
                  </select>
                </div> <!-- Disk Type Search -->
                <br />
                Minimum Disk Capacity in Gigabyte (GB)
                <div class="form-group">
                  <select class="form-control" id="diskCapacity" name="diskCapacitySelected">
                    <option>500</option>
                    <option>800</option>
                    <option>1000</option>
                    <option>1600</option>
                    <option>2000</option>
                  </select>
                </div> <!-- Disk Capacity Search -->
                <br />
                <input  class="btn btn-info" name="searchCriteria" type="submit" id="searchBtn" value="Search" />
              </div>
            </div> <!-- Panel Body -->
          </div>
        </div> <!-- Accordion Panel group -->
      </form> <!-- Form to POST -->
     </div> <!-- Container -->

    <!-- Product Load Container -->
     <div class="container">
       <table class="table" id="searchTableplace">
        <!-- <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody> -->
      </table> <!-- Table -->

     </div> <!-- Container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="jscript.js"></script>
  </body>
</html>