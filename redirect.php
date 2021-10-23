<?php include "header.php"; ?>

<main>

    <div class="row g-1 text-center">
        <h2>Redirect</h2>
        <?php

        if (isset($_POST["submit"])) {
            $plate = $_POST["plate"];
            $query = $con->prepare("SELECT * FROM `customer` WHERE plate='$plate'");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute();
            if ($row = $query->fetch()) {
        ?>
                <?php if ($row->check_out == 1) {
                ?>
                    <div class="alert alert-danger gap-0" role="alert">
                        <h6><?php echo $row->plate; ?> Plakalı araç <b>Çıkış</b> yapmış!</h6>
                        <h1>Lütfen Bekleyin</h1>
                        <h5>Yeni Giriş için; Giriş sayfasına Yönlendiriliyorsunuz...</h5>
                        <?php header("Refresh: 5; url=signin.php"); ?>
                    </div>
                <?php
                } else {

                ?>

                    <div class="alert alert-info gap-0 g-2" role="alert">
                        <?php
                        date_default_timezone_set('Europe/Istanbul');
                        $finishtime = date("H:i:s");
                        $finishdate = date("Y-m-d");
                        ?>
                        <h6>Entry: <?php echo $row->entry_date . " " . $row->entry_time; ?></h6>
                        <h6>Exit: <?php echo $finishdate . " " . $finishtime; ?></h6>
                        <?php
                        //saatdkburadaheaplanıypr
                        //saatdkburadaheaplanıypr
                        $baslangic     = strtotime($row->entry_date . "" . $row->entry_time);
                        $bitis         = strtotime($finishdate . "" . $finishtime);
                        $fark        = abs($bitis - $baslangic);
                        $toplantiDk = $fark / 60;
                        $toplantiSaat = $toplantiDk / 60;
                        // echo $baslangic."<br>";
                        // echo $bitis."<br>";
                        echo "Otopark süresi toplam " . floor($toplantiDk) . " dakikadır.<br>";
                        echo "Otopark süresi toplam " . floor($toplantiSaat) . " saatdır.";
                        //saatdkburadaheaplanıypr
                        //saatdkburadaheaplanıypr

                        ?>
                        <h1>Otopark Süresi : <?php echo floor($toplantiSaat) . ' Saat'; ?>
                            <span class="badge bg-secondary"><?php $tutar = $toplantiSaat * 10;
                                                                echo floor($tutar) . ' TL'; ?></span>
                            <!-- Tutar eğeri buradan alınabilir -->
                        </h1>
                        <h6>Çıkış işlemini tamamlamak için <b>Bilgileri Kontrol Et</b> butonuna tıklayın</h6>
                    </div>

                    <p>
                        <button class="btn btn-success " type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                            Bilgileri Kontrol Et
                        </button>
                    </p>
                    <div style="min-height: 120px;">
                        <div class="collapse collapse-horizontal g-2" id="collapseWidthExample">
                            <div class="card card-body g-2" style="width: auto;">
                                <form action="exit.php" method="post">

                                    <div class="row g-3 text-center ">

                                        <div class="col-sm-12 text-center">

                                            <div class="row">
                                            <div class="col-3">
                                                    
                                                    <input class="form-control" type="text"  value="Otopark No. :" aria-label="Disabled input example" disabled readonly>
                                                    <input class="form-control" type="text"  value="Plakanız :" aria-label="Disabled input example" disabled readonly>
                                                    <input class="form-control" type="text"  value="Otopark Ücreti :" aria-label="Disabled input example" disabled readonly>
                                                    <input class="form-control" type="text"  value="Çıkış Saati :" aria-label="Disabled input example" disabled readonly>
                                                    <input class="form-control" type="text"  value="Çıkış Tarihi :" aria-label="Disabled input example" disabled readonly>
                                                </div>
                                                <div class="col-3">
                                                    
                                                    <input class="form-control" type="text" name="id" value="<?php echo $row->customer_id; ?>" aria-label="readonly input example" readonly>
                                                    <input class="form-control" type="text" name="plate" value="<?php echo $row->plate; ?>" aria-label="readonly input example" readonly>
                                                    <input class="form-control" type="text" name="tutar" value="<?php echo floor($tutar); ?>" aria-label="readonly input example" readonly>
                                                    <input class="form-control" type="text" name="zaman" value="<?php echo $finishtime; ?>" aria-label="readonly input example" readonly>
                                                    <input class="form-control" type="text" name="tarih" value="<?php echo $finishdate; ?>" aria-label="readonly input example" readonly>
                                                </div>

                                                <div class="col-6">
                                                    <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum facilisis fringilla felis vel faucibus. Nunc luctus eleifend orci ac tempus. Nullam eget diam sed mauris ultricies imperdiet. Ut in ullamcorper lectus, vel facilisis leo. Nulla placerat eros eu posuere posuere. Integer viverra bibendum pretium. Sed urna nunc, tincidunt rutrum arcu.</h6>
                                                    <hr>
                                                    <input type="submit" class="btn btn-danger" value="Otoparktan Çıkış Yap" name="submit">
                                                </div>

                                            </div>

                                        </div>

                                        

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    </div>


<?php
                }
?>

<?php
            } else {
?>
    <h1>Lütfen Bekleyin</h1>
    <h5>Aracınız Sistemde bulunmamakta Giriş sayfasına Yönlendiriliyorsunuz...</h5>

    <?php header("Refresh: 10; url=signin.php"); ?>

<?php
            }
        }
?>
</div>
</main>
<?php include "footer.php"; ?>