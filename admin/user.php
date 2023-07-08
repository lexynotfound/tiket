<html>

<head>
    <title>Admin</title>
    <link rel="icon" href="../image/logo.png">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/materialize.min.js"></script>
</head>

<body>
    <?php include "nav.php"; ?>

    <div class="container">
        <div class="row">
            <div style="border: 3px;
  padding: 25px;
  border-radius: 10px;" class="col s12">
                <br />
                <br />
                <div style="border: 3px;
  padding: 25px;
  border-radius: 10px;" class="card-panel black-text white">
                    <h5>Daftar User</h5>
                    <table>
                        <thead style="background-color: rgba(0, 0, 0, 0.25);" class="black-text">
                            <tr>
                                <td>Username</td>
                                <td>Fullname</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody class="black-text">
                            <?php include "koneksi.php";
                            $sql = mysqli_query($conn, 'select * from user ');
                            while ($dtt = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <td>
                                        <?= $dtt['username']; ?>
                                    </td>
                                    <td>
                                        <?= $dtt['fullname']; ?>
                                    </td>
                                    <td>
                                        <a href="user_d.php" onclick="return confirm('Admin Yakin ingin menghapusnya?');"><button class="btn waves-effect red white-text"><i class="ion-android-delete"></i></button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="index.php" onclick="window.close();"><button style="border: 3px;
  padding: 10px;
  border-radius: 10px;" class="btn waves-effect red"><i class="ion-close"></i></button></a>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>