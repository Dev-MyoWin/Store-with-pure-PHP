<?php
ob_start();
session_start();
if(isset($_SESSION['auth']) )
{
?>
<?php
include("connection.php");
$id=$_GET['id'];
$sql="SELECT * FROM `users` WHERE id=$id";

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);
?>
<title>Edit eidtor</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<?php include ("components/nav.php");?>
<div class="container">
 <h1 class="display-4 text-primary my-5"><i class="fa fa-pencil"></i> Edit Editor</h1>
<form action="update_editor.php" method="POST">
<input type="text" name="id" value="<?php echo $row['id'] ?>" hidden>
<div class="form-group">
<label for="productName" class="text-success "> Name</label>
<input type="text" class="form-control" id="productName" name="name" value="<?php echo $row['name'] ?>">
</div>
<div class="form-group">
<label for="productName" class="text-success ">User Name</label>
<input type="text" class="form-control" id="productName" name="user_name" value="<?php echo $row['user_name'] ?>">
</div>
<div class="form-group">
<label for="productName" class="text-success ">Email</label>
<input type="text" class="form-control" id="productName" name="email" value="<?php echo $row['email'] ?>">
</div>

<div class="form-group">
<label for="productName" class="text-success">Role</label>

<select class="form-control" id="ProductCategory" name="role" >
<?php

$role_sql="SELECT * FROM roles";

$role_result=mysqli_query($conn,$role_sql);

while($role_row=mysqli_fetch_assoc($role_result)): ?>

<option value="<?php echo $role_row['name']?>"<?php if($role_row['name']==$row['role'] ) 
{echo "selected";}?> >
 <?php   echo $role_row['name'];?> 
 
 </option>

 

<?php endwhile;?>
</select>

</div>
<div class="form-group">
<label for="productName" class="text-success">Password</label>
<input type="text" class="form-control" id="CreatedDate" name="password" value="<?php echo $row['password'] ?>">
</div>
    <input type="submit" class="btn btn-block btn-success float-right my-3" value="SAVE">
</form>	
<?php
}
else
{
    header("location:auth/login.php");
}
?>