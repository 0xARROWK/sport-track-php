<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Activités</title>

    <!-- CSS THEME -->

    <link rel="stylesheet" href="resources/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/iconfonts/font-awesome/css/font-awesome.min.css">

    <style>
        .col-separator {
            border-left: 1px solid rgba(0, 0, 0, 0.2);
        }

        .striped div:nth-child(even) {
            background-color: #ddd !important;
        }

        .striped div:nth-child(even) .col-separator {
            border-left: 1px solid rgba(0, 0, 0, 0.2);
        }
    </style>

</head>

<body id="body">

<div class="container-scroller">

    <!-- PAGE CONTENT -->

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background: white; border-bottom: 1px solid #ff7b00">
        <form action="" method="post">
            <input type="hidden" name="page" value="list_activities">
            <button type="submit" class="navbar-brand" style="background: transparent; border: 0px solid transparent; color: #ff7b00;"><span class="fa fa-arrow-left"></span> <b>Retour</b></button>
        </form>
    </nav>

    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">

            <!-- CONTENT WRAPPER -->

            <div class="home-wrapper">

                <div class="row mt-5"></div>

                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <h2>Entrées de l'activité <?php echo $_SESSION['user']['activity_id']; ?></h2>
                    </div>
                </div>

                <div class="row mt-5 mb-5">

<?php

    if (isset($_SESSION['user']['activity_entries']) && !empty($_SESSION['user']['activity_entries'])) {

        $a = $_SESSION['user']['activity_entries'];

?>

                    <div class="col-xl-10 offset-xl-1 d-none d-xl-block striped">

                        <div class="row pt-3 pb-3 justify-content-center">

                            <span class="col-xl-2 text-center"><b>#</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Durée</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Fréquence cardiaque</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Latitude</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Longitude</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Altitude</b></span>

                        </div>

<?php

        foreach ($a as $key) {

?>

                        <div class="row pt-3 pb-3 justify-content-center">

                            <span class="col-xl-2 d-flex align-items-center">
                                <span class="text-center w-100">
                                    <?php echo $key->getIdActivityEntry(); ?>
                                </span>
                            </span>
                            <span class="col-xl-2 d-flex align-items-center col-separator">
                                <span class="text-center w-100">
                                    <?php echo $key->getTimeD(); ?>
                                </span>
                            </span>
                            <span class="col-xl-2 d-flex align-items-center col-separator">
                                <span class="text-center w-100">
                                    <?php echo $key->getCardioFrequency(); ?>
                                </span>
                            </span>
                            <span class="col-xl-2 d-flex align-items-center col-separator">
                                <span class="text-center w-100">
                                    <?php echo $key->getLongitude(); ?>
                                </span>
                            </span>
                            <span class="col-xl-2 d-flex align-items-center col-separator">
                                <span class="text-center w-100">
                                    <?php echo $key->getLatitude(); ?>
                                </span>
                            </span>
                            <span class="col-xl-2 d-flex align-items-center col-separator">
                                <span class="text-center w-100">
                                    <?php echo $key->getAltitude(); ?>
                                </span>
                            </span>

                        </div>

<?php

        }

?>

                    </div>

                    <div class="col-10 offset-1 mt-5 text-center d-block d-xl-none">
                        Vous ne pouvez pas consulter les détails de vos activités sur smartphone et tablette !
                    </div>

<?php

    } else {

?>

                    <div class="col-10 offset-1 mt-5 text-center d-none d-xl-block">
                        Ajoutez des activités pour voir leurs détails apparaître ici !
                    </div>

<?php

    }

    unset($_SESSION['user']['activity_entries']);

?>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>