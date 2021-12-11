<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
    <title>bài số 2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/atyle.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <a href="#" class="navbar-brand">
                <img class="d-inline-block align-top" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" height="30" width="30">
                Quản lý học sinh
            </a>
            <form class="form-inline" action="not_allow.php" method="post">
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
        <h3 class="text-center mt-5 bold">Bạn không có quyền truy cập trang này</h3>
    </main>
    <footer class="text-center font-italic">
        PHẠM THÙY LINH - 78671
    </footer>
</body>

</html>