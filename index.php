<?php include "header.php"; ?>
<main>
    <div class="row g-1 text-center ">
        <h2>Index</h2>
        <form action="redirect.php" method="post">

            <div class="row g-3 text-center ">

                <div class="col-sm-12 text-center">
                    <input type="text" class="form-control" name="plate" placeholder="Plakanızı giriniz.." required>
                </div>

                <input type="submit" class="btn btn-secondary" value="Otopark Durum Bilgisi Al" name="submit">

            </div>
        </form>
    </div>
</main>
<?php include "footer.php"; ?>