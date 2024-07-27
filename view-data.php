<?php 

include("connection.php");
$id = $_GET['id'];


$sql = "SELECT * FROM admission WHERE id = '$id'";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
       
        while($row = mysqli_fetch_assoc($result)){
            ?>

<table border="1" style="border-collapse: collapse; width: 400px; margin:auto;">
<tr>
        <th>S.N</th>
        <th><?= $row['id']?></th>
    </tr>
    <tr>
        <th>Name</th>
        <th><?= $row['name']?></th>
    </tr>
    <tr>
        <th>DOB</th>
        <th><?= $row['dob']?></th>
    </tr>
    <tr>
        <th>Gender</th>
        <th><?= $row['gender']?></th>
    </tr>
    <tr>
        <th>Email</th>
        <th><?= $row['email']?></th>
    </tr>
    <tr>
        <th>Phone</th>
        <th><?= $row['phone']?></th>
    </tr>
    <tr>
        <th>Address</th>
        <th><?= $row['address']?></th>
    </tr>
    <tr>
        <th>Confirmation</th>
        <th><?= $row['confirmation']?></th>
    </tr>
</table>





<?php

        }
    }
}

?>