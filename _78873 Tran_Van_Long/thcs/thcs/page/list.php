<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

if (!isset($_SESSION['is_login'])){
    header("Location: index.php");
    die;
}
if (isset($_POST['logout'])){
    session_destroy();
    header("Location: ../index.php");
    die;
}


$is_search = 0;
$conn = new PDO('mysql:host=localhost;dbname=thcs', "student", "123456",);
$query = $conn->prepare("select * from hocsinh");
$query->execute();
if (isset($_POST['search'])){
    $key = $_POST['keyword'];
    $query = $conn->prepare("select * from hocsinh where hovaten like ?");
    $query->execute(["%".$key."%"]);
    $is_search = 1;
}

if (isset($_POST['clear'])){
    $query = $conn->prepare("select * from hocsinh");
    $query->execute();
    $is_search = 0;
}

?>

<!doctype html>
<html lang="en">
<head>
    <title>Bài số 2 </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/atyle.css">
</head>
<body>
<header>
    <nav class="navbar navbar-light bg-light">
        <a href="#" class="navbar-brand">
            <!-- <img class="d-inline-block align-top" -->
                 <!-- src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" height="30" width="30"> -->
            Quản lý học sinh
        </a>
        <form class="form-inline" action="list.php" method="post">
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
    <div class="mt-5 table-margin">
        <form class="mb-3" method="post" action="list.php">
            <div class="form-inline">
                <input class="form-control mr-2 min-width" type="text" name="keyword"
                       placeholder="Nhập tên học sinh">
                <button name="search" type="submit" class="btn btn-success">Tìm kiếm</button>
                <button name = "clear" class="btn btn-primary ml-2">Hiển thị toàn bộ</button>
            </div>
            <h5 class="form-text mt-2"><?php if($is_search) echo "Kết quả tìm kiếm cho '".$_POST['keyword']."'"; else echo "Tất cả học sinh" ?></h5>
        </form>
        <table class="table custom-table table-success">
            <thead class="thead-dark">
            <tr>
                <th scope="col">mã học sinh</th>
                <th scope="col">trạng thái</th>
                <th scope="col">mã lớp</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">ngày sinh</th>
                <th scope="col">mô tả</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
                <tr>
                    <th role="row"><?= $row['id']; ?></th>
                    <td><?= $row['trangthai'] ?></td>
                    <td><?= $row['lop_id']?></td>
                    <td><?= $row['hovaten']?></td>
                    <td><?= $row['ngaysinh']?></td>

                    <td><a href="add.php">Thêm</a> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<footer class="text-center font-italic">
    <h1>PHẠM THÙY LINH - 78671</h1>
</footer>
</body>
</html>
