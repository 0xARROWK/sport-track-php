<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Déconnexion</title>

    <!-- CSS THEME -->

    <link rel="stylesheet" href="resources/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="resources/css/style.css">

</head>

<body id="body">

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center theme-one">
            <div class="row w-100 mx-auto">
                <div class="col-lg-4 mx-auto">
                    <div class="auto-form-wrapper">

                        <div class="row mt-5">

                            <div class="col-12 d-flex text-center justify-content-center">
                                Votre compte à été créé.<br>Vous êtes désormais connecté en tant que <?php echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname']; ?>.
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12 mt-5 d-flex justify-content-center">
                                <form action="" method="POST">
                                    <input type="hidden" name="page" value="/">
                                    <div class="col-12 mt-2 mb-2">
                                        <button type="submit" class="btn btn-primary">Accueil</button>
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
