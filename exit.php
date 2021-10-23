<?php include "header.php"; ?>

<main>

    <div class="row g-1 text-center">
        <h2>Exit</h2>

        <?php
        if (isset($_POST["submit"])) {
            $id = $_POST["id"];
            $plate = $_POST["plate"];
            $tutar = $_POST["tutar"];
            $zaman = $_POST["zaman"];
            $tarih = $_POST["tarih"];
            $check = 1;

            // echo $plate . "<br>";
            // echo $tutar . "<br>";
            // echo $zaman . "<br>";
            // echo $tarih . "<br>";
            // echo $check . "<br>";

            try {

                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE `customer` SET 
                `payment` = '$tutar',
                `check_out` = '$check',
                `exit_time` = '$zaman',
                `exit_date` = '$tarih' WHERE `customer`.`customer_id` = $id";
                $con->exec($sql);
        ?>
                <br>
                <div class="alert alert-success" role="alert">
                    Çıkış Başarılı!(Anasayfaya
                    Yönlendiriliyorsunuz...10sn)

                </div>
                <?php header("Refresh: 10; url=index.php"); ?>
        <?php
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
        ?>

    </div>
</main>
<?php include "footer.php"; ?>