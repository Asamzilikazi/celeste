<?php
include_once('DatabaseConn.php');

$firstname = $lastname = $idnumber = $cell = $province = $primarylang = $secondarylang = $cellErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {  
  } else {
    $firstname = test_input($_POST["firstname"]);
  }
  
  if (empty($_POST["lastname"])) { 
  } else {
    $lastname = test_input($_POST["lastname"]);
  }
    
  if (empty($_POST["idnumber"])) {
  } else {
    $idnumber = test_input($_POST["idnumber"]);
  }

  if (empty($_POST["cell"])) {
  } else {
    if(preg_match('/^[0-9]{10}+$/', $cell)) {
      $cell = test_input($_POST["cell"]);
    }
    else{
      $cellErr = "This format is incorrect";
    }
  }

  if (empty($_POST["province"])) {
  } else {
    $province = test_input($_POST["province"]);
  }
  if (empty($_POST["primarylang"])) {
  } else {
    $primarylang = test_input($_POST["primarylang"]);
  }

  if (empty($_POST["secondarylang"])) {
  } else {
    $secondarylang = test_input($_POST["secondarylang"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Fetching Values From URL
// $firstname = $row['firstname'];
// $lastname = $row['lastname']; // Replace column_to_display with the column you want the results from
// $idnumber = $row['idnumber']; 
// $cell = $row['cell']; 
// $province = $row['province']; 
// $primarylang = $row['primarylang']; 
// $secondarylang = $row['secondarylang']; 

if(isset($_POST['submit']))
{
    $sqlselect = "SELECT idnumber FROM userinformation Where idnumber = ".$_POST["idnumber"];
    $result = mysqli_query($conn, $sqlselect);
   
    if($result->num_rows > 0){
      echo "Could not add, id number already exists";
    }
    else{
        $sql = "INSERT INTO userinformation (firstname, lastname, idnumber, cell, province, primarylang, secondarylang )
        VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["idnumber"]."','".$_POST["cell"]."','".$_POST["province"]."','".$_POST["primarylang"]."','".$_POST["secondarylang"]."')";

        $result = mysqli_query($conn,$sql);

        if ($result) {
          echo "New record created successfully";
    } else {
          echo "Error: " . mysqli_error($conn);
    }
    }
    
}
?>