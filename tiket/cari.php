<html>

<head>
    <title>Cari Tiket</title>
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
            <div class="col s12">
                <div class="card-panel default">
                    <center>
                        <h1>Hasil Pencarian Tiket</h1>
                        <a href="index.php"><button class="btn waves-effect">Cari Lagi</button></a>
                    </center>
                    <table>
                        <thead>
                            <tr>
                                <td>Tanggal Berangkat</td>
                                <td>Dari</td>
                                <td>Tujuan Ke</td>
                                <td>Harga Tiket</td>
                                <td>Type</td>
                                <td>Pesan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['cari'])) {
                                $cari = $_POST['cari'];

                                $sql = "SELECT rute.id_rute, rute.depart, rute.rute_from, rute.rute_to, rute.price, tipe_transportasi.description
FROM rute, transportasi, tipe_transportasi
WHERE tipe_transportasi.id_trans_type = transportasi.id_trans_type AND rute.id_trans = transportasi.id_trans AND (CONVERT(id_rute USING utf8) LIKE '%$cari%' OR CONVERT(depart USING utf8) LIKE '%$cari%' OR CONVERT(rute_from USING utf8) LIKE '%$cari%' OR CONVERT(rute_to USING utf8) LIKE '%$cari%' OR CONVERT(price USING utf8) LIKE '%$cari%' OR CONVERT(rute.id_trans USING utf8) LIKE '%$cari%')";
                                $query = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($query);
                                if ($row == 0) {
                                    echo "Pencarian tidak ditemukan, Silahkan Cari lagi!";
                                } else {
                                    while ($data = mysqli_fetch_array($query)) {
                            ?>
                                        <tr>
                                            <td><?= $data['depart']; ?></td>
                                            <td><?= $data['rute_from']; ?></td>
                                            <td><?= $data['rute_to']; ?></td>
                                            <td><?= $data['price']; ?></td>
                                            <td><?= $data['description']; ?></td>
                                            <td><a href="booking.php?id_rute=<?= $data['id_rute']; ?>"><button class="btn waves-effect"><i class="ion-ios-book"></i> Pesan</button></a></td>
                                        </tr>
                            <?php
                                    }
                                }
                            } else {
                                echo "Pencarian tidak ditemukan, Silahkan Cari lagi!";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>