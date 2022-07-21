<?php
//params 
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$database = "newdb";
$insert=false;
//buid connection with DB

$connect = mysqli_connect($servername,$username,$password,$database);
/* if($connect){
	echo "connected";
}
else{
	echo"error occur ".mysqli_error($connect);
}*/
//Get form data
if($_SERVER['REQUEST_METHOD']=='POST'){
	$Title = $_POST['Title'];
	$Desc = $_POST['Description'];
};


//sql query to submit data in DB
$sql = "INSERT INTO inotes( title, Description)VALUES ('$Title', '$Desc'); ";
$result = mysqli_query($connect,$sql);

//Fetch data  from DB

$sqlqueryfatch = 'SELECT * FROM inotes ;';

$fatchdone = mysqli_query($connect,$sqlqueryfatch);

//how many rows affacted
$rows_total = mysqli_num_rows($fatchdone);
$rows = mysqli_fetch_assoc($fatchdone);
?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>iNotes</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>


<nav class="navbar navbar-dark bg-dark" style ="border-radius:4">
<div class="container-fluid" style ="border-radius:4%">

<a class="navbar-brand" href="#">iNotes</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="#">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Link</a>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
Dropdown
</a>
<ul class="dropdown-menu">
<li><a class="dropdown-item" href="#">Action</a></li>
<li><a class="dropdown-item" href="#">Another action</a></li>
<li><hr class="dropdown-divider"></li>
<li><a class="dropdown-item" href="#">Something else here</a></li>
</ul>
</li>
<li class="nav-item">
<a class="nav-link disabled">Disabled</a>
</li>
</ul>



<form class="d-flex" role="search">
<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
<button class="btn btn-outline-success" type="submit">Search</button>
</form>
</div>
</div>
</nav>

<?php
if($result){
	
	echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Note Added !</strong> Your Note has been successfully Added !. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
	
}



?>


<!-- Form -->
<h2 style = "margin-top:5%; ">Add new Note</h2>

<form style = "margin-top:6%;" method = "post" action = "/inotes.php">
<div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Title</label>
<input type="text"name = "Title" class="form-control" id="Title" aria-describedby="emailHelp">

</div>
<div class="mb-3">
<label for="exampleInputPassword1" class="form-label">Description</label>
<textarea type="text" name = "Description" class="form-control" id="Description"></textarea>
</div>

<button type="submit" class="btn btn-primary">Add Note</button>
</form>
 <!--Card -->
 <div style="text-algin:center; background-color:black;color:white;">
 
 <h4 style = "margin-top:5%;  " style="margin-left:25%;color :white;">Your Notes</h4>
 
 </div>
 <div >
<?php

if($rows_total>0){
	while($rows = mysqli_fetch_assoc($fatchdone)){
		echo '    
		<div  class="card" style="width: 18rem;margin-top:5%;margin-left:6%;">
		<div class="card-body">
		<h5 class="card-title">'.$rows["Title"].'</h5>
		<p class="card-text">'.$rows["Description"].'</p>
		<a href="#" class="btn btn-primary" class = "delete" id = "d'.$rows["Sr_no"].'">
		Delete</a>
		</div>
		</div> ';
		
	}
}
else{
	echo "No Notes Presents";
}

?>
</div>
 <script>
 
//On working hold 
deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/crud/index.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })


</script>
 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>