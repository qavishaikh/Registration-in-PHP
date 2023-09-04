<?php

$user = 0;
$succes = 0;
$invalid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    // $sql = "insert into  `registration` (username,password)
    // values('$username', '$password')";

    // $result = mysqli_query($con,$sql);

    // if($result){
    //     echo "Data Inserted Successfully";
    // }
    // else{
    //     die(mysqli_errno($con));
    // }



    $sql = "Select * from `registration` where username = '$username'";

    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            // echo "User Already Exists";
            $user = 1;
        } else {
            if($password===$cpassword){
            $sql = "insert into  `registration` (username,password)
            values('$username', '$password')";

            $result = mysqli_query($con, $sql);
            if($result){
                // echo "SignUp Successfully";
                $succes = 1;
                header('location:Login_Page.php');
            }
        }
            else{
                // die(mysqli_errno($con));
                $invalid = 1;
            }
        
    }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

<?php

if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry!</strong> User Already Exists.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} 

?>
<?php

if($succes){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> You are Successfully Signed Up.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} 

?>
<?php

if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Invalid!</strong> Invalid Password
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} 

?>


    <h1 class="text-center mt-3">Signup Page</h1>
    <div class="container mt-5">
        <form action="./sign.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Name</label>
                <input type="text" placeholder="Enter Your Name" name="username" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" placeholder="Enter Your Password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                <input type="password" placeholder="Confirm Password" name="cpassword" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">SignUp</button>
        </form>
    </div>
</body>

</html>