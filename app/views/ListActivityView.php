<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Activités</title>

    <!-- CSS THEME -->

    <link rel="stylesheet" href="resources/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="resources/css/style.css">

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
        <div class="navbar-collapse collapse">
            <form class="navbar-nav mr-auto" action="" method="post">
                <input type="hidden" name="page" value="/">
                <button type="submit" class="navbar-brand" style="background: transparent; border: 0px solid transparent;">
                    <img class="img-fluid" style="max-height: 50px;" src="resources/img/sport_track.png">
                    <span style="color: #ff7b00;"><b>SportTrack</span></b>
                </button>
            </form>
        </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">

            <!-- CONTENT WRAPPER -->

            <div class="home-wrapper">

                <div class="row mt-5">t</div>

                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <h2>Ajouter une activité</h2>
                    </div>
                </div>

                <div class="row mt-5">

                    <div class="col-8 offset-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 col-xl-2 offset-xl-5">

                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Fichier d'activité :</label>
                                <input id="activity-file" onchange="document.getElementById('activity-file-name').value = this.value.replace('C:\\fakepath\\', '')" type="file" name="activity-file" class="file-upload-default">
                                <div class="col-12 input-group" style="padding: 0px;">
                                    <input id="activity-file-name" type="text" class="form-control" disabled="" name="activity-file-name">
                                    <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" onclick="document.getElementById('activity-file').click()" type="button">Upload</button>
                                            </span>
                                </div>
                            </div>
                            <input type="hidden" name="page" value="upload_activity">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-block btn-primary">Envoyer</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

                <div class="row">
                    <div class="col-10 offset-1">
                        <hr class="mt-5" style="border-top: 1px solid rgba(0, 0, 0, 0.2);">
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <h2>Mes activités</h2>
                    </div>
                </div>

                <div class="row mt-5 mb-5">

<?php

    if (isset($_SESSION['user']['activity']) && !empty($_SESSION['user']['activity'])) {

        $a = $_SESSION['user']['activity'];

?>

                    <div class="col-xl-10 offset-xl-1 d-none d-xl-block striped">

                        <div class="row pt-3 pb-3 justify-content-center">

                            <span class="col-xl-2 text-center"><b>Description</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Date</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Durée</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Distance parcourue</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Fréquences cardiaques</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Actions</b></span>

                        </div>

<?php

        foreach ($a as $key) {

?>

                        <div class="row pt-3 pb-3 justify-content-center">

                            <span class="col-xl-2 d-flex align-items-center">
                                <span class="text-center w-100">
                                    <?php echo $key->getDescription(); ?>
                                </span>
                            </span>
                            <span class="col-xl-2 d-flex align-items-center col-separator">
                                <span class="text-center w-100">
                                    <?php echo $key->getDay(); ?>
                                </span>
                            </span>
                            <span class="col-xl-2 col-separator">
                                <?php echo "Commencée à : ".$key->getBeginning()."<br>"; ?>
                                <?php echo "Terminée à : ".$key->getEnding()."<br>"; ?>
                                <?php echo "Durée totale : ".date("H:i:s", (strtotime($key->getEnding()) - strtotime($key->getBeginning()))); ?>
                            </span>
                            <span class="col-xl-2 col-separator">
                                <?php echo round($key->getTotalDistance(), 2, PHP_ROUND_HALF_UP); ?>
                            </span>
                            <span class="col-xl-2 col-separator">
                                <?php echo "Max : ".$key->getMaxFrequency()."<br>"; ?>
                                <?php echo "Min : ".$key->getMinFrequency()."<br>"; ?>
                                <?php echo "Moyenne : ".round($key->getAvgFrequency(), 2, PHP_ROUND_HALF_UP); ?>
                            </span>
                            <span class="col-xl-2 d-flex align-items-center col-separator">
                                <span class="w-100">
                                    <form action="" method="POST" class="col-12">
                                        <input type="hidden" name="page" value="activity_details">
                                        <input type="hidden" name="activity-id" value="<?php echo $key->getIdActivity(); ?>">
                                        <button class="col-8 offset-2 btn btn-primary btn-block">Détails</button>
                                    </form>
                                    <form action="" method="POST" class="col-12 mt-2">
                                        <input type="hidden" name="page" value="delete_activity">
                                        <input type="hidden" name="activity-id" value="<?php echo $key->getIdActivity(); ?>">
                                        <button class="col-8 offset-2 btn btn-danger btn-block">Supprimer</button>
                                    </form>
                                </span>
                            </span>

                        </div>

<?php

        }

?>

                    </div>

                    <div class="col-10 offset-1 mt-5 text-center d-block d-xl-none">
                        Vous ne pouvez pas consulter vos activités sur smartphone et tablette !
                    </div>

<?php

    } else {

?>

                    <div class="col-10 offset-1 mt-5 text-center d-none d-xl-block">
                        Ajoutez des activités pour les voir apparaître ici !
                    </div>

<?php

    }

    unset($_SESSION['user']['activity']);

?>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>