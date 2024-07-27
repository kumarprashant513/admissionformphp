<?php

include("connection.php");

$data = '

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<table
class="table table-hover table-bordered table-striped"
border="1" style="border-collapse:collapse; width:1200px; margin: auto; text-align: center; ">
<tr>
    <th>S.N</th>
    <th>Name</th>
    <th>DOB</th>
    <th>Gender</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Confirmation</th>
    <th>View</th>
    <th>Add</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>';


$sql = "SELECT * FROM admission";

$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            // echo '<h2>'.$row['name'].'-----'.$row['dob'].'</h2>';
            $count++;
            // echo $table;
            $data .= '<tr>
            <th>' . $count . '</th>
            <th>' . $row["name"] . '</th>
            <th>' . $row["dob"] . '</th>
            <th>' . $row["gender"] . '</th>
            <th>' . $row["email"] . '</th>
            <th>' . $row["phone"] . '</th>
            <th>' . $row["address"] . '</th>
            <th>' . $row["confirmation"] . '</th>
            <th><a class="btn btn-primary" href="view-data.php?id=' . $row["id"] . ' "><i class="fa-solid fa-eye"></i></a></th>
            <th><a class="btn btn-info" href="add-data.php?id=' . $row["id"] . ' "><i class="fa-solid fa-square-plus"></i></a></th>
            <th><a class="btn btn-success" href="edit-data.php?id=' . $row["id"] . ' "><i class="fa-solid fa-pen-to-square"></i></a></th>
            <th><a class="btn btn-danger" href="delete-data.php?id=' . $row["id"] . ' "><i class="fa-solid fa-trash"></i></a></th>
        </tr>';
        }
    } else {
        $data .= '<tr><th  colspan="8" >No Data Found</th></tr></table>';
    }
}
echo $data;
