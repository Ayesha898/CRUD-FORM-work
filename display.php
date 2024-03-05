<?php
  session_start();
  ?>

<html>
   <head>
      <title>Display</title>
      <style>
         body
         {
            background: skyblue;
         }
         table
         {
            background-color: white;
         }
         .update
         {
            background: green;
            color: white;
            border: 0;
            outline: none;
            border-radius: 5px;
            height: 35px;px;
            width: 100px;
            font-weight: bold;
            cursor: pointer;
            margin-left: 5px;
         }
         .delete
         {
            background: Red;
            color: white;
            border: 0;
            outline: none;
            border-radius: 5px;
            height: 35px;px;
            width: 100px;
            font-weight: bold;
            cursor: pointer;
            margin-left: 5px;
            margin-top: 10px;

         }
      </style>
   </head>
</html>
<?php
 include("connection.php");
 error_reporting(0);

 $userprofile = $_SESSION['user_name'];
 if($userprofile == true)
 {
    
 }
 else
 {
    header('location:login.php');
 }

 $query = "SELECT * FROM FORM";
 $data = mysqli_query($conn, $query);

 $total = mysqli_num_rows($data);
  
  //echo $total;

 if($total != 0)
 {   
   ?>
   <h1 align="center"><mark>Display All Records</mark></h1>
   <center> <table border="2" cellspacing="7" width="100%" align="center">
      <tr>
         <th width="5%">ID</th>
         <th width="5%">image</th>
         <th width="8%">First Name</th>
         <th width="8%">last Name</th>
         <th width="10%">Gender</th>
         <th width="20%">Email</th>
         <th width="10%">Phone</th>
         <th width="10%">Caste</th>
         <th width="10%">languages</th>
         <th width="24%">Address</th>
         <th width="15%">Operations</th>

      </tr>
   <?php

    while( $result = mysqli_fetch_assoc($data))
    {
      echo "<tr>
                <td>".$result['id']."</td>

                <td><img src= '".$result['std_img']."' height='100px' width='100px'</td>

                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['gender']."</td>
                <td>".$result['email']."</td>
                <td>".$result['phone']."</td>
                <td>".$result['caste']."</td>
                <td>".$result['language']."</td>
                <td>".$result['address']."</td>

                 <td><a href='update_design.php?id=$result[id]'><input
                 type='submit' value='Update' class='update'></a>

                 <a href='delete.php?id=$result[id]'><input
                 type='submit' value='Delete' class='delete' onclick = 'return checkdelete()'></a></td>
            ";
    }
 }
 else
 {
    echo "No records found";
 }

 ?>
   </table>
   </center>
   
   <a href="logout.php"><input type="submit" name="" value="LogOut" style="background: purple; color:white; height:35px;
   width:100px; margin-top :25px; font-size:18px; border: 0; border-radius: 5px; cursor: pointer;" ></a>
  
   <script>
    function checkdelete()
    {
      return confirm('Are you sure your want to delete this record ?');
    }

   </script>