<html>

<head>
    <title>Admin | Transportation</title>
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
                <div style="border: 3px;
  padding: 25px;
  border-radius: 10px;" class="card-panel white-text blue">
                    <h5>Transportation</h5>
                    <table>
                        <thead style="background-color: rgba(0, 0, 0, 0.25);" class="white-text">
                            <tr>
                                <td>Code</td>
                                <td>Description</td>
                                <td>Seat</td>
                                <td>Trans Type</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody class="white-text">
                            <?php include "koneksi.php";
                            $sql = mysqli_query($conn, 'select * from transportasi ');
                            while ($dtt = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <td>
                                        <?= $dtt['code']; ?>
                                    </td>
                                    <td>
                                        <?= $dtt['description']; ?>
                                    </td>
                                    <td>
                                        <?= $dtt['seat']; ?>
                                    </td>
                                    <td>
                                        <?= $dtt['id_trans_type']; ?>
                                    </td>
                                    <td>
                                        <a href="trans_d.php?id_trans=<?= $dtt['id_trans']; ?>" onclick="return confirm('Sure, want to delete?');"><button style="border: 3px;
  padding: 10px;
  border-radius: 10px;" class="red btn waves-effect"><i class="ion-trash-b"></i></button></a>
                                        <a href="trans_u.php?id_trans=<?= $dtt['id_trans']; ?>"><button style="border: 3px;
  padding: 10px;
  border-radius: 10px;" class="yellow btn waves-effect"><i class="ion-edit"></i></button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col s12">
                <div style="border: 3px;
  padding: 25px;
  border-radius: 10px;" class="card-panel">
                    <h3><i class="ion-plus"></i> Add Transportation</h3>
                    <form method="post" action="trans_t.php">
                        <div class="input-field">
                            <?php
                            $rang = range(1, 9);
                            shuffle($rang);
                            $c = implode($rang);
                            $code = $c;
                            ?>
                            <input type="text" name="codec" id="code" value="<?= $code; ?>" class="btn disabled">
                            <label for="code">Code</label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="description" id="desc" required>
                            <label for="desc">Description</label>
                        </div>
                        <div class="input-field">
                            <?php $r = range(1, 2);
                            shuffle($r);
                            $b = implode($r);
                            $seat = $b; ?>
                            <input type="text" name="seatc" id="seat" value="<?= $seat; ?>">
                            <label for="seat">Seat</label>
                        </div>
                        <select name="id_trans_type" class="browser-default">
                            <option selected disabled>Type: </option>
                            <?php
                            include 'koneksi.php';
                            $result = mysqli_query($conn, "SELECT * FROM tipe_transportasi ");
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row['id_trans_type'] ?>"><?php echo $row['description'] ?></option>
                            <?php } ?>
                        </select>
                        <button style="border: 3px;
  padding: 10px;
  border-radius: 10px;" class="btn waves-effect green"><i class="ion-plus"></i></button>
                    </form>
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