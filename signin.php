<?php include "header.php"; ?>

<main>
    <div class="row g-1 text-center">
        <h2>Sign in</h2>
        <form action="signincheck.php" method="post">

            <div class="row g-3">
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" placeholder="Ad ve Soyadınızı giriniz.." required>
                </div>

                <div class="col-sm-6">
                    <input type="text" name="plate" class="form-control" placeholder="Araç Plakasını giriniz.." required>
                </div>

                <input type="submit" class="btn btn-secondary" name="submit">
            </div>
        </form>
    </div>
</main>

<?php include "footer.php"; ?>