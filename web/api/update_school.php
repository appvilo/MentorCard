<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();



if (isset($_POST['user_name']) && isset($_POST['user_id']) && isset($_POST['password']) && isset($_POST['first_name'])
&& isset($_POST['last_name'])&& isset($_POST['date'])
&& isset($_POST['street'])&& isset($_POST['phone'])
&& isset($_POST['email'])&& isset($_POST['mobile_number'])&& isset($_POST['post_code'])
&& isset($_POST['city'])) {

   
    $user_name = $_POST['user_name'];

    $user_id = $_POST['user_id'];

    $user_pass = $_POST['password'];

    $user_fn = $_POST['first_name'];

    $user_ln = $_POST['last_name'];

    $user_date = $_POST['date'];

  

    $user_country = $_POST['street'];
    
    $user_phone = $_POST['phone'];

    $user_email = $_POST['email'];

    $user_mobile_number = $_POST['mobile_number'];

    $user_post_code = $_POST['post_code'];

    $user_city = $_POST['city'];
    


     
    $user_profile = $db->getUpdateSchool($user_name,$user_pass,$user_email,$user_fn,$user_ln,$user_date,$user_country,$user_phone,$user_mobile_number,
                $user_post_code,$user_city,$user_id);

       
                if($user_profile!=false){
  

                    $response["user"]["username"] = "true";
                    $response["user"]["status"] = 'OK';
                    echo json_encode($response);


                }else{

                     // user is not found with the credentials
       $response["error"] = TRUE;
       $response["error_msg"] = "User are  credentials are wrong. Please try again!";
       echo json_encode($response);

                }


       
    
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter is missing!";
    echo json_encode($response);
}
?>
