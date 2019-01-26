<?php

$sql = "DELETE FROM userinformation WHERE idnumber = ".$_POST["idnumber"];

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>