<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//var_dump($_SESSION);
if (!isset($_SESSION['is_login'])) {
    header("Location: ../index.php");
    die;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../index.php");
    die;
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Bài kiểm tra 2 </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/atyle.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <a href="#" class="navbar-brand">
                <!-- <img class="d-inline-block align-top" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" height="30" width="30"> -->
                Quản lý học sinh
            </a>
            <form class="form-inline" method="post" action="home.php">
                <button name="logout" class="btn btn-outline-danger" type="submit">Đăng xuất</button>
            </form>
        </nav>
    </header>
    <main>
        <nav class="nav navbar-light bg-light">
            <a class="nav-link" href="home.php">
                Trang chủ
            </a>
            <a class="nav-link" href="list.php">
                Danh sách học sinh
            </a>
            <a class="nav-link" href="add.php">
                Thêm nhận xét mới
            </a>
            <a class="nav-link" href="anh1.png">
                Ảnh câu 1
            </a>
        </nav>
        <h3 class="text-center mt-5">Bài kiểm tra</h3>
        <h5 class="text-center mt-2 mb-3">Bài số 2</h5>
        <h6 class="text-center mt-2">Người dùng: <?= $_SESSION['user_name'] . ' (' . $_SESSION['user'] . ')' ?></h6>
        <h6 class="text-center mt2 ">Đăng nhập với tư cách: <?= ($_SESSION['is_admin']) == 0 ? "user" : "Quản trị viên" ?></h6>
        <h6 class="text-center mt-2 mb-5">Đăng nhập lúc: <?= $_SESSION['login_time'] ?> </h6>

    </main>
    <footer class="text-center font-italic">
    <h1>PHẠM THÙY LINH - 78671</h1>
    </footer>
</body>

</html>