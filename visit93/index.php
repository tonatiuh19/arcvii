<?php
// define variables and set to empty values
session_start();
require_once('../admin/cn.php');


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>arcvii</title>
  </head>
  <body>
    <h1>Visits</h1>
    <?php
    $sql = "SELECT section, id_visitors, timestamp FROM visitos";
    $result = $conn->query($sql);
    $conteo=0;
    if ($result->num_rows > 0) {
      echo '<table class="table">
          <thead>
            <tr>
              <th scope="col">Id Visitor</th>
              <th scope="col">Section</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>



          ';// output data of each row
        while($row = $result->fetch_assoc()) {

            echo '<tr>
              <td>'.$row["id_visitors"].'</td>
              <td>'.$row["section"].'</td>
              <td>'.$row["timestamp"].'</td>
            </tr>';
            $conteo=$conteo+1;
        }
        echo '<th scope="col"></th>
        <th scope="col">Total visits:</th>
        <th scope="col">'.$conteo.'</th></tbody>
      </table>';
    } else {
        echo "0 results";
    }
    $conn->close();
     ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
