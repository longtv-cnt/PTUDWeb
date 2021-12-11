<?php
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    include 'connect.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE username = '$username' AND matkhau = '$password'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$row){
            echo 'Đăng nhập thất bại';
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['datetime'] = date('d/m/Y H:m:s');
            header('Location:index.php');
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <header>ĐĂNG NHẬP</header>
    <content>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Username">                  </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    </div>
                    <br>
                    <button type="submit" value="Login" name="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </content>
    <footer>Ngô Quang Vinh - 80413 - CNT59DH</footer>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>