<?php include("connection.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Oerations</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrape.css">

</head>
<body>
    <div class="container">
        <form action="#" method="POST"enctype= "multipart/form-data">
        <div class="title">
            Registration Form
        </div>
        <div class="form">

        <div class="input_field">
                <label for="">Upload image</label>
                <input type="file" name="uploadfile" style="width: 100%;">
            </div>
            <div class="input_field">
                <label for="">First Name</label>
                <input type="text" class="input" name="fname" required>
            </div>

            <div class="input_field">
                <label for="">Last Name</label>
                <input type="text" class="input" name="lname" required>
            </div>

            <div class="input_field">
                <label for="">Password</label>
                <input type="Password" class="input" name="password" required>
            </div>

            <div class="input_field">
                <label for="">Confirm Password</label>
                <input type="Password" class="input" name="conpassword" required>
            </div>

            <div class="input_field">
                <label for="">Gender</label> 
                <div  class="custom_select">
                <select name="gender" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>

            <div class="input_field">
                <label for="">Email Address</label>
                <input type="text" class="input" name="email" required>
            </div>

            <div class="input_field">
                <label for="">Phone Numder</label>
                <input type="text" class="input" name="phone" required>
            </div>

            <div class="input_field">
            <label style="margin-right: 100px;">Caste</label>
            <input type="radio" name="r1" value="General" required><label style="margin-left: 5px;">General</label>
            <input type="radio" name="r1" value="OBC" required><label style="margin-left: 5px;">OBC</label>
            <input type="radio" name="r1" value="SC" required><label style="margin-left: 5px;">SC</label>
            <input type="radio" name="r1" value="ST" required><label style="margin-left: 5px;">ST</label>
            </div>

            <div class="input_field">
            <label style="margin-right: 100px;">Language known</label>
            <input type="checkbox" name="language[]" value="English"><label style="margin-left: 5px;">English</label>
            <input type="checkbox" name="language[]" value="Urdu"><label style="margin-left: 5px;">Urdu</label>
            <input type="checkbox" name="language[]" value="Hindko"><label style="margin-left: 5px;">Hindko</label>
           
            </div>

            <div class="input_field">
                <label for="">Address</label>
                <textarea class="textarea" name="address" required></textarea>
            </div>

            <div class="input_field terms">
                <label class="check">
                    <input type="checkbox" required>
                    <span class="checkmark"></span>
                </label>
                <p>Agree to terms and conditions</p>
            </div>

            <div class="input_field">
                <input type="Submit" value="Register" class="btn" name="register">
            </div>
        </div>
</form> 
    </div>
    
</body>
</html>

<?php

   if($_POST['register'])
   {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/".$filename;
    move_uploaded_file($tempname, $folder);


    $fname   = $_POST['fname'];
    $lname   = $_POST['lname'];
    $pwd     = $_POST['password'];
    $cpwd    = $_POST['conpassword'];
    $gender  = $_POST['gender'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $caste   = $_POST['r1'];

    $lang  = $_POST['language'];
    $lang1 = implode(",",$lang);

    //  echo $lang1;

    $address = $_POST['address'];

   $query = "INSERT INTO FORM (std_img,fname,lname,password,cpassword,gender,email,phone,caste,language,address) VALUES
   ('$folder','$fname','$lname','$pwd','$cpwd','$gender','$email','$phone','$caste','$lang1','$address' )";
   
   $data = mysqli_query($conn,$query);
   if($data)
   {
      echo "<script> alert('Data Inserted into Database')</script>";
   }
   else
   {
    echo "<script> alert('Falied')</script>";

}
}
  
?>
