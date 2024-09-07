<?php
   session_start();
   include("connection_request.php");
   if($_SERVER['REQUEST_METHOD']=="POST")
   {
    $email=$_POST['Login_Id'];
    $password = $_POST['Password'];
    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
      $query="select * from supplier_signup where Login_Id='$email' limit 1";
      $result=mysqli_query($conn,$query);
      if($result)
      {
        if($result && mysqli_num_rows($result)>0)
        {
          $user_data=mysqli_fetch_assoc($result);
          if($user_data['Password']==$password)
          {
            echo "<script>
            alert('Signin successful');
            window.location.href = 'supplier_page.php';
          </script>";
          }
        }
      }
      echo "wrong email id or password";
    }
  }
  ?>