
<!DOCTYPE html>
<html lang="en"> 
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Authentication Login Form</title>

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
   <link rel="stylesheet" href="./style.css">

   <script type="text/javascript">
      function validateform() {
         var x=document.forms["myForm"]["username"].value;
         if (x=="")
         {
            alert("UserName must be filled out ")
            return false;
         }

         var x1=document.forms["myForm"]["mobile"].value;
         if (x1=="")
         {
            alert("mobile number must be filled out ")
            return false;
         }
         var x2=document.forms["myForm"]["email"].value;
         if (x2=="")
         {
            alert("Email must be filled out ")
            return false;
         }

      }
   </script>
</head>


<body>
   
<div class="container">
   <form name="Registration" method="post" id="myForm" onsubmit="return validateform()" class="form bg-glass">
      


      <div class="profile bg-glass">

         <i class="fas fa-user"></i>
      </div>    
      
     

      <input type="text" class="input bg-glass" placeholder="Name" name="username" >
      <input type="text-" class="input bg-glass" placeholder="Mobile" name="mobile" >
      <input type="text" class="input bg-glass" placeholder="Email" name="email" >
      <br>
      <div style="margin-left: -170px;">
      <label>Male</label> 
      <input type="radio" class="" value="male"name="gender">
       &nbsp;  &nbsp; 
      <label>Female</label>
      <input type="radio" class=""  value="Female" name="gender">
      </div>
     

      <input type="submit" name="submit" class="button">
   

    

     
   </form>
</div>
</body>

</html>
<?php
error_reporting(0);
include 'config.php';

if(isset($_POST['submit']))
{
   extract($_POST);

      $asd="insert into register(username,mobile,email,gender)
      values('$username','$mobile','$email','$gender')";

      $add=mysqli_query($connect,$asd)or die(mysqli_error($connect));
      if ($asd) {
         echo "<script>;";
         echo "window.alert('Registration Successful');";
         echo 'window.location.href ="../login page/login.php";';
         echo "</script>";
      }
      else
      {
         echo"<script>;";
         echo"window.alert('You have not provided valid details');";
         echo "</script>";
      }
}


$err ="";
                    $ses = "";
                    $otp = rand(111111,999999);

                    $_SESSION['otp']=$otp;

                    if(preg_match("/^\d+\.?\d*$/",$mobile) && strlen($mobile)==10)
                    {

                        $fields = array(
                        "variables_values" => "$otp",
                        "route" => "otp",
                        "numbers" => "$mobile",
                        );

                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 60,
                        CURLOPT_SSL_VERIFYHOST => 0,
                        CURLOPT_SSL_VERIFYPEER => 0,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => json_encode($fields),
                        CURLOPT_HTTPHEADER => array(
                        "authorization: D58eGaNFoHCYrnuMylXTcIpd7W01w4jBvfVOKEZRiszg23xbtJCdfFT0LKUhc85BXjJnbpzZIwmDSElt",
                        "accept: */*",
                        "cache-control: no-cache",
                        "content-type: application/json"
                        ),
                        ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);

                        if ($err) 
                        {
                            echo "cURL Error #:" . $err;
                        }
                        else
                        {
                            $data = json_decode($response);
                            $sts = $data->return;
                            if ($sts == false)
                            {
                                $err = "Otp Not Send";
                            }
                            else
                            {
                                $ses = "Your OTP is send";
                            }
                        }


                    }
                    else
                    {
                        $err = "Invalied Mobile Number";
                    }


 ?>
