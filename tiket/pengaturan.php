<html>

<head>
    <title>Pengaturan</title>
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
  border-radius: 10px;" class=" col s5">
                <div style="border: 3px;
  padding: 25px;
  border-radius: 10px;" class="card-panel">
                    <h3>Data Anda</h3>
                    <div class="card">
                        <?php
                        include "koneksi.php";
                        $sa = mysqli_query($conn, 'select * from pelanggan where  username="' . $_SESSION['user'] . '" ');
                        if ($sa) {
                            $da = mysqli_fetch_array($sa);
                        ?>
                            <div class="card-content">
                                <h5>Nama</h5>
                                <p class="black-text">
                                    <?= isset($da['name']) ? $da['name'] : 'No data available'; ?>
                                </p>
                                <br />
                                <h5>Alamat</h5>
                                <p class="black-text">
                                    <?= isset($da['address']) ? $da['address'] : 'No data available'; ?>
                                </p>
                                <br />
                                <h5>No.HP</h5>
                                <p class="black-text">
                                    <?= isset($da['phone']) ? $da['phone'] : 'No data available'; ?>
                                </p>
                                <h5>Jenis Kelamin</h5>
                                <p class="black-text">
                                    <?= isset($da['gender']) ? $da['gender'] : 'No data available'; ?>
                                </p>
                            </div>
                        <?php
                        } else {
                            echo "Error: Unable to fetch data from the database.";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div style="border: 3px;
  padding: 25px;
  border-radius: 10px;" class="col s7">
                <div style="border: 3px;
  padding: 25px;
  border-radius: 10px;" class="card-panel">
                    <h4>Silahkan isi data berikut ini</h4>
                    <?php
                    include "koneksi.php";
                    $ss = mysqli_query($conn, 'select * from user where  username="' . $_SESSION['user'] . '" ');
                    if ($ss) {
                        $ds = mysqli_fetch_array($ss);
                    ?>
                        <form method="post" action="pengaturan_p.php">
                            <div class="input-field">
                                <input type="text" name="name" id="name" required value="<?= isset($ds['fullname']) ? $ds['fullname'] : ''; ?>">
                                <label for="name">Nama Lengkap</label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="address" id="addr" required>
                                <label for="addr">Alamat</label>
                            </div>
                            <div class="input-field">
                                <input type="number" name="phone" id="phone" required>
                                <label for="phone">No HP</label>
                            </div>
                            <select class="browser-default" name="gender" required>
                                <option selected disabled>Jenis Kelamin:</option>
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <div class="input-field">
                                <input type="text" name="username" id="user" value="<?= isset($ds['username']) ? $ds['username'] : ''; ?>" required class="btn disabled">
                                <label for="user">Username</label>
                            </div>
                            <br />
                            <?php
                            include "koneksi.php";
                            $cs = mysqli_query($conn, 'select * from pelanggan where username="' . $_SESSION['user'] . '" ');
                            if ($cs) {
                                $fu = mysqli_num_rows($cs);
                                if ($fu == 0) {
                            ?>
                                    <a href=""><button class="btn waves-effect blue"><i class="ion-android-send"></i></button></a>
                            <?php
                                } else {
                                    echo "<p>Tidak perlu input lagi</p>";
                                }
                            } else {
                                echo "Error: Unable to fetch data from the database.";
                            }
                            ?>
                        </form>
                    <?php
                    } else {
                        echo "Error: Unable to fetch data from the database.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>