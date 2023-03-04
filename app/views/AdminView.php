<?php

require_once 'model/ActivityDAO.php';
require_once 'model/SportsmanDAO.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administration</title>

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
            <input type="hidden" name="page" value="/">
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
                        <h2>Gestion des comptes</h2>
                    </div>
                </div>

                <div class="row mt-5 mb-5">

<?php

    if (isset($_SESSION['all_accounts']) && !empty($_SESSION['all_accounts'])) {

        $a = $_SESSION['all_accounts'];

?>

                    <div class="col-xl-10 offset-xl-1 d-none d-xl-block striped">

                        <div class="row pt-3 pb-3 justify-content-center">

                            <span class="col-xl-2 text-center"><b>Prénom</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Nom</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Email</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Distance parcourue</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Modération</b></span>
                            <span class="col-xl-2 text-center col-separator"><b>Action</b></span>

                        </div>

<?php

        foreach ($a as $key) {

            if ($key->getEmail() !== "admin@sporttrack.fr") {

                $activities = ActivityDAO::getInstance()->findAllFromSportsman($key->getEmail());

?>

                        <div class="row pt-3 pb-3 justify-content-center">

                            <span class="col-xl-2 d-flex align-items-center">
                                <span class="text-center w-100">
                                    <?php echo $key->getFirstName(); ?>
                                </span>
                            </span>
                            <span class="col-xl-2 d-flex align-items-center col-separator">
                                <span class="text-center w-100">
                                    <?php echo $key->getLastName(); ?>
                                </span>
                            </span>
                            <span class="col-xl-2 d-flex align-items-center col-separator">
                                <span class="text-center w-100">
                                    <?php echo $key->getEmail(); ?>
                                </span>
                            </span>
                            <span class="col-xl-2 d-flex align-items-center col-separator">
                                <span class="text-center w-100">
                                    <?php echo round(ActivityDAO::getInstance()->findDistanceSumFromSportsman($key->getEmail()), 2, PHP_ROUND_HALF_UP); ?>
                                </span>
                            </span>
                            <span class="col-xl-2 d-flex align-items-center col-separator">
                                <span class="text-center w-100">
                                    <form action="" method="POST" class="col-12">
                                        <input type="hidden" name="page" value="admin_action">
                                        <input type="hidden" name="reset-account" value="<?php echo $key->getEmail(); ?>">
                                        <button class="col-8 offset-2 btn btn-primary btn-block">Réinitialiser le compte</button>
                                    </form>
                                </span>
                            </span>
                            <span class="col-xl-2 d-flex align-items-center col-separator">
                                <span class="text-center w-100">
                                    <form action="" method="POST" class="col-12">
                                        <input type="hidden" name="page" value="admin_action">
                                        <input type="hidden" name="delete-account" value="<?php echo $key->getEmail(); ?>">
                                        <button class="col-8 offset-2 btn btn-danger btn-block">Supprimer le compte</button>
                                    </form>
                                </span>
                            </span>

                        </div>

<?php

            }

        }

?>

                    </div>

                    <div class="col-10 offset-1 mt-5 text-center d-block d-xl-none">
                        Vous ne pouvez pas consulter la liste des comptes sur smartphone et tablette !
                    </div>

<?php

    } else {

?>

                    <div class="col-10 offset-1 mt-5 text-center d-none d-xl-block">
                        Aucun compte n'a été enregistré !
                    </div>

<?php

    }

    unset($_SESSION['all_accounts']);

?>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>