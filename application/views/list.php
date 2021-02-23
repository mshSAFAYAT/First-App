
<!DOCTYPE html>
<html>
<head>
	<title>Crud Application - Create User</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>"></link>
</head>
<body>
	<div class="navbar-dark bg-dark">
		<div class="container">
			<a href="#" class='navbar-brand'>CRUD Application</a>
			
		</div>
		
	</div>
	<div class="container">
		<h3>View User</h3>
		<div class="col-6">
			<a href="<?php echo base_url().'index.php/user/create'?>" class="btn btn-primary">Create</a>
		</div>
		<hr>
 		<div class="row">
 			<div class="col-mid-12">
 				<table class="table table-striped">
 					<tr>
 						<th>ID</th>
 						<th>Name</th>
 						<th>Email</th>
 						<th>Edit</th>
 						<th>Delete</th>
 					</tr>
 					<?php if(!empty($users)) {
 					foreach($users as $user) {
 					?>
 					<tr>
 						<td>
 							<?php echo $user['uid']?>
 						</td>
 						<td>
 							<?php echo $user['name']?>
 						</td>
 						<td>
 							<?php echo $user['email']?>
 						</td>
 						<td>
 						<a href="<?php echo base_url().'index.php/user/edit/'.$user['uid']?>" class="btn btn-primary"> Edit</a></td>
 						<td>
 						<a href="<?php echo base_url().'index.php/user/delete/'.$user['uid']?>" class="btn btn-primary"> Delete</a></td>
 					</tr>
 					<?php }} else {
 					?>
 					<tr>
 						<td colspan="5">Records not found</td>
 					</tr>
 					<?php }?>
 				}
 				}
 				}
 				</table>
 			</div>
 		</div>
	</div>

</body>
</html>