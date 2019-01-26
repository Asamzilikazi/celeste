<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="js/indexFunction.js"></script>
		<title>Search</title>
		<style>
		table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 50%;
		}
		.table-row{
		cursor:pointer;
		}
		td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
		}

		tr:nth-child(even) {
		background-color: #dddddd;
		}
</style>
	</head>
	<body>
	<form method="POST" action="search.php">
			<input type="text" name="q" placeholder="query">
			<input type="submit" name="search" value="Search">
		</form>
	<?php
include_once('DatabaseConn.php');
$output = "";
if(isset($_POST['search'])){
	$searchedQuery = $_POST['q'];
	$query = mysqli_query($conn,"SELECT * FROM userinformation WHERE firstname LIKE '%$searchedQueryq%' || lastname LIKE '%$searchedQueryq%'|| idnumber LIKE '%$searchedQueryq%'|| province LIKE '%$searchedQuery%'"); 

	$count = mysqli_num_rows($query);
	if($count == "0"){
		echo '<h2>No results found!</h2>';
	}else{

				echo '<table >
					<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>ID Number</th>
					<th>Cellphone Number</th>
					<th>Province</th>
					<th>Primary Language</th>
					<th>Secondary Language</th>
				  </tr>';
				  
	
					while($row = mysqli_fetch_array($query)){
					$firstname = $row['firstname'];
					$lastname = $row['lastname']; 
					$idnumber = $row['idnumber']; 
					$cell = $row['cell']; 
					$province = $row['province']; 
					$primarylang = $row['primarylang']; 
					$secondarylang = $row['secondarylang']; 
	
					echo '<tr class="table-row"data-href="http://tutorialsplane.com">
					<td>'.$firstname.'</td>
					<td>'.$lastname.'</td>  
					<td>'.$idnumber.'</td> 
					<td>'.$cell.'</td> 
					<td>'.$province.'</td> 
					<td>'.$primarylang.'</td> 
					<td>'.$secondarylang.'</td> 
					</tr>
					';
					
		}
		echo '</table>';
		
	}

}
		?>
		

		
		
				  

				  
					
		  
			
			 



	</body>
</html>

