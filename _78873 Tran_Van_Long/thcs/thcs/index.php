<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}

if (isset($_SESSION['is_login'])){
    header("Location: page/home.php");
    die;
}
//var_dump($_POST);

if (isset($_POST['login'])){
    $pdo = new PDO("mysql:host=localhost;dbname=thcs","student","123456");
    $query = $pdo->prepare("select * from user where username = ? and matkhau = ?");
    if ($query->execute([$_POST['email'],$_POST['pass']])){
        $data = $query->fetchAll();
        if (empty($data)){
            echo "<script>alert('Thông tin đăng nhập sai!')</script>";
        } else {
            $_SESSION['is_admin'] = $data[0]['quyenhan'];
            $_SESSION['is_login'] = true;
            $_SESSION['user'] = $data[0]['username'];
            $_SESSION['user_name'] = $data[0]['tendaydu'];
            $_SESSION['login_time'] =  date('d/m/Y H:m:s');
            header("page/home.php");
            die;
        }
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <title>Đăng nhập </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/atyle.css">
</head>
<body>
<div class="center-div-login shadow p-3">
    <h3>Xin mời đăng nhập</h3>
    <!-- <small class="form-text">Liên hệ quản trị viên nếu cần hỗ trợ về tài khoản</small> -->
    <form action="index.php" method="post">
        <div class="form-group mt-4">
            <label for="email">Tài khoản</label>
            <input name="email" id="email" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pass">Mật khẩu</label>
            <input name="pass" id="pass" type="password" class="form-control" required>
        </div>
        <div class="form-group mt-4 text-right">
            <button name ="login" type="submit" class="btn btn-outline-primary">Đăng nhập</button>
            <button name="cancel" class="btn btn-outline-danger">Hủy bỏ</button>
        </div>
    </form>
</div>
</body>
</html>
