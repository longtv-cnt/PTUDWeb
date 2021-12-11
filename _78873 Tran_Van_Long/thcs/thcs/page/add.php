<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['is_login'])) {
    header("Location: ../index.php");
    die;
}
if ($_SESSION['is_admin'] != 1) {
    header("Location: not_allow.php");
    die;
}

$pdo = new PDO("mysql:host=localhost;dbname=thcs", "student", "123456");
if (isset($_POST['add'])) {

    $hocsinh_id = $_POST['hocsinh_id'];
    $namhoc = $_POST['namhoc'];
    $nhanxetchung = $_POST['nhanxetchung'];
    $uudiem = $_POST['uudiem'];
    $cankhacphuc = $_POST['cankhacphuc'];
    $duoclenlop = $_POST['duoclenlop'];

    $nhanxet = $pdo->prepare("insert into tongketnam( hocsinh_id,nhanxetchung,uudiem) values (?,?,?)");


    if ($nhanxet->execute([$hocsinh_id, $nhanxetchung, $uudiem])) {

        header("Location: add.php");
    } else {
        echo "<script>alert('Lỗi, kiểm tra xem mã vận đơn có bị trùng hay không')</script>";
    }
} else if (isset($_POST['cancel'])) {
    header("Location: list.php");
    die;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../index.php");
    die;
}
//prepare data for selector
$hocsinh = $pdo->prepare("select * from hocsinh");
$nhanxet2 = $pdo->prepare("select * from tongketnam");

if ($hocsinh->execute() && $nhanxet2->execute()) {
} else {
    echo "<script>alert('Lỗi không xác định')</script>";
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Đề 9 </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/atyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <a href="#" class="navbar-brand">
                <!-- <img class="d-inline-block align-top" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" height="30" width="30"> -->
                Quản lý học sinh
            </a>
            <form class="form-inline" action="add.php" method="post">
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
        <div class="mx-auto w-50 m-4 shadow rounded p-3">
            <div class="text-center">
                <h4>Thêm nhận xét mới</h4>
            </div>
            <form action="add.php" method="post">


                <div class="form-group">
                    <label for="namhoc">Năm học</label>
                    <input id="namhoc" name="namhoc" type="text" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="hocsinh_id">Tên học sinh</label>
                    <select id="hocsinh_id" name="hocsinh_id" class="form-control" required>
                        <?php foreach ($hocsinh as $n) : ?>
                            <option value='<?= $n['id'] ?>'><?= $n['hovaten'] . ' (id: ' . $n['id'] . ')' ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>



                <div class="form-group">
                    <label for="nhanxetchung">nhan xet chung</label>
                    <input id="nhanxetchung" name="nhanxetchung" type="text" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="uudiem">uu diem</label>
                    <input id="uudiem" name="uudiem" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cankhacphuc">can khac phuc</label>
                    <input id="cankhacphuc" name="cankhacphuc" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="duoclenlop">duoc len lop</label>
                    <input id="duoclenlop" name="duoclenlop" type="text" class="form-control" required>
                </div>

                <div class="form-group text-right">
                    <button name="add" type="submit" class="btn btn-outline-primary">Thêm</button>
                    <button name="cancel" class="btn btn-outline-danger" formnovalidate>Hủy bỏ</button>
                </div>
            </form>
        </div>
        <div class="mt-5 table-margin">

            <table class="table custom-table table-success">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">mã học sinh</th>
                        <th scope="col">năm học</th>
                        <th scope="col">nhận xét chung</th>
                        <th scope="col">ưu điểm</th>
                        <th scope="col">cần khắc phục</th>
                        <th scope="col">được lên lớp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($nhanxet2 as $row) : ?>
                        <tr>
                            <th role="row"><?= $row['id']; ?></th>
                            <td><?= $row['hocsinh_id'] ?></td>
                            <td><?= $row['namhoc'] ?></td>
                            <td><?= $row['nhanxetchung'] ?></td>
                            <td><?= $row['uudiem'] ?></td>
                            <td><?= $row['cankhacphuc'] ?></td>
                            <td><?= $row['duoclenlop'] ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer class="text-center font-italic">
    <h1>PHẠM THÙY LINH - 78671</h1>
</body>

</html>