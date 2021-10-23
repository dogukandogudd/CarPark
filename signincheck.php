<?php include "header.php"; ?>
<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $plate = $_POST["plate"];
    date_default_timezone_set('Europe/Istanbul');
    $time = date("H:i:s");
    $date = date("Y-m-d");

    $query = $con->prepare("SELECT * FROM `customer` WHERE plate='$plate'");
    $query->setFetchMode(PDO::FETCH_OBJ);
    $query->execute();
    $say = $query->fetchColumn();

    if ($say > 0) {
?>
        <br>
        <div class="alert alert-danger" role="alert">
            Bilgileriniz sistemde bulunuyor! Plakanızın Doğru olduğundn emin olun (Anasayfaya
            Yönlendiriliyorsunuz...5sn)
        </div>
        <?php header("Refresh: 5; url=index.php"); ?>
        <?php
    } else {
        try {
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO `customer` (customer_name, plate, entry_time, entry_date, check_out)
            VALUES ('$name', '$plate', '$time', '$date','0')";
            $con->exec($sql);
        ?>
            <br>
            <div class="alert alert-success" role="alert">
                Kayıt Başarılı!(Anasayfaya
                Yönlendiriliyorsunuz...10sn)

            </div>
            <?php header("Refresh: 10; url=index.php"); ?>
<?php
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
?>
<?php include "footer.php"; ?>