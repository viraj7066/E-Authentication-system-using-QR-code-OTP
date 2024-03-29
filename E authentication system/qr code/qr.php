<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>QR code</title>

   
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
   <link rel="stylesheet" href="./style.css">
   <title>QR code</title>
</head>

<body>
   

   <form action="" class="form bg-glass">   
   <h1>Verify Your QR</h1>
   
   <p>We messaged you the QR code <br/> Point the QR code to the webcam for authentication.</p>


   
      <style>
    #preview{
       width:500px;
       height: 500px;
       margin:-50px auto;
    }
    </style>
    <video id="preview"></video>
<script 
src="https://code.jquery.com/jquery-3.6.0.min.js" 
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
crossorigin="anonymous"></script>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script type="text/javascript">
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){
        console.log(content)
       
        if (content) {
            // render to the welcome page
            alert("Successfully login!!")
            window.location.href=(" ../demo/index.html");
           
        }
        //alert(content);
        
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });
    
</script>


<?php

$service_plan_id = "a11ff293a2c64243bd34c7665acae766";
$bearer_token = "ef011448a1744a92bb0469dedcad6991";



$mysql = mysqli_connect("localhost", "root", "", "auth");

$sql = "SELECT mobile FROM `register`";

$result = mysqli_query($mysql, $sql);

$mobile = NULL;

while ($row = mysqli_fetch_assoc($result))
{
    $mobile = $row['mobile'];
}


//Any phone number assigned to your API
$send_from = "+447520651126";
//May be several, separate with a comma ,
$recipient_phone_numbers = "+91" . $mobile;

$message = "http://surl.li/bxlib";

// Check recipient_phone_numbers for multiple numbers and make it an array.
if(stristr($recipient_phone_numbers, ',')){
  $recipient_phone_numbers = explode(',', $recipient_phone_numbers);
}else{
  $recipient_phone_numbers = [$recipient_phone_numbers];
}

// Set necessary fields to be JSON encoded
$content = [
  'to' => array_values($recipient_phone_numbers),
  'from' => $send_from,
  'body' => $message
];

$data = json_encode($content);

$ch = curl_init("https://us.sms.api.sinch.com/xms/v1/{$service_plan_id}/batches");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
curl_setopt($ch, CURLOPT_XOAUTH2_BEARER, $bearer_token);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($ch);

curl_close($ch);

?>


      
         
      </div>

     
      
   </form>

</body>

</html>