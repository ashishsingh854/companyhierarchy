<?php
	$connection = mysqli_connect('localhost', 'root', '', 'company') or die(mysqli_error(connection));
	session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Fetch</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="css/login.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<div class="content top centered">
		<div class="container">
				<div class="col-xs-8 col-xs-offset-2">
					<center><h2>Fetch Employee Data</h2></center><br/><br/>
					<div><b>Filter</b></div>
					<form method="post">
						<div>1. Show Salary <input type="text" class="form-control col-xs-4" name="salary" placeholder="Enter salary in integer/float"><br/><br/><br/>
						<div>2. Show Hirarchy under id <input type="text" class="form-control col-xs-4" name="id" placeholder="Enter id"><br/><hr/><br/>
						<input type="submit" value="FILTER" class="btn btn-primary" name="filter">
						<input type="submit" value="SHOW ALL RECORDS" class="btn btn-primary" name="record">
					</form>
					<br/><br/><br/>
					<table class="table" border="1px">
						<?php
							if(array_key_exists('record', $_POST)){
								$selectid = "Select * from Employee";
								$selectid_result = mysqli_query($connection, $selectid) or die(mysqli_error($connection));
								$i=0;
						?>
								<tr>
									<th>Id</th>
									<th>Parent_id</th>
									<th>Type</th>
									<th>Name</th>
									<th>Salary</th>
								</tr>
						<?php
								while($i < mysqli_num_rows($selectid_result)){
									$array = mysqli_fetch_array($selectid_result);
						?>
									<tr>
										<td><?php echo $array['id']; ?></td>
										<td><?php echo $array['parent_id']; ?></td>
										<td><?php echo $array['type']; ?></td>
										<td><?php echo $array['name']; ?></td>
										<td><?php echo $array['salary']; ?></td>
									</tr>
						<?php
									$i++;
								}
							}
							if(array_key_exists('filter', $_POST)){
								$select_query = "Select e1.type,e2.name,e1.name,e1.salary,e1.id from Employee e1 left join Employee e2 on e2.id=e1.parent_id order by e2.name";
								$select_query_result = mysqli_query($connection, $select_query) or die(mysqli_error($connection));
						?>
								<tr>
									<th>#</th>
									<th>Type</th>
									<th>Reporting Head</th>
									<th>Employee Name</th>
									<th>Salary</th>
								</tr>
						<?php
								$i=0;
								$sal = $_POST['salary'];
								$hier = $_POST['id'];
								if($sal!=null){
									while($i<mysqli_num_rows($select_query_result)){
										$array1 = mysqli_fetch_array($select_query_result);
										if($array1['salary'] == $sal){
						?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $array1['type']; ?></td>
												<td><?php echo $array1['1']; ?></td>
												<td><?php echo $array1['2']; ?></td>
												<td><?php echo $array1['salary']; ?></td>
											</tr>
						<?php
										}
										$i++;
									}
								}
								if($hier!=null){
									$select_sql = "Select e1.type,e2.name,e1.name,e1.salary,e1.id from Employee e1 left join Employee e2 on e2.id=e1.parent_id where e1.id=$hier";
									$select_sql_result = mysqli_query($connection, $select_sql) or die(mysqli_error($connection));
									while($i<mysqli_num_rows($select_sql_result)){
										$arr = mysqli_fetch_array($select_sql_result);
						?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $arr['type']; ?></td>
											<td><?php echo $arr['1']; ?></td>
											<td><?php echo $arr['2']; ?></td>
											<td><?php echo $arr['salary']; ?></td>
										</tr>
						<?php
										$i++;
									}
								}
								else{
									while($i<mysqli_num_rows($select_query_result)){
										$array1 = mysqli_fetch_array($select_query_result);
						?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $array1['type']; ?></td>
											<td><?php echo $array1['1']; ?></td>
											<td><?php echo $array1['2']; ?></td>
											<td><?php echo $array1['salary']; ?></td>
										</tr>
						<?php
									$i++;
									}
								}
							}
						?>
					</table>
				</div>
		</div>
		</div>
	</body>
</html>