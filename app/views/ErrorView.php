
<?php

if (isset($_SESSION['error']['message']) && isset($_SESSION['error']['return'])) {
    $error = $_SESSION['error']['message'];
    $page = $_SESSION['error']['return'];
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inscription</title>

    <!-- CSS THEME -->

    <link rel="stylesheet" href="resources/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="resources/css/style.css">

</head>

<body id="body">

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center theme-one">
            <div class="row w-100 mx-auto">
                <div class="col-lg-8 col-xl-6 mx-auto">
                    <div class="auto-form-wrapper">

                        <div class="row mt-5">

                            <div class="col-12 d-flex text-center justify-content-center">
                                <span style="color: red;"><?php echo (empty($error)) ? '404 : Destination inconnue.' : $error ?></span>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12 mt-5 d-flex justify-content-center">
                                <form action="" method="POST">
                                    <input type="hidden" name="page" value="<?php echo (empty($page)) ? '/' : $page ?>">
                                    <div class="col-12 mt-2 mb-2">
                                        <button type="submit" class="btn btn-primary">Retour</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php

unset($_SESSION['error']);

?>