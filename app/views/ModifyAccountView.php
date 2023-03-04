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
                <div class="col-lg-8 col-xl-4 mx-auto">
                    <div class="auto-form-wrapper">

                        <div class="row mt-5">

                            <div class="col-12">

                                <img class="mt-5 mb-5 col-4 offset-4 col-md-2 offset-md-5 col-xl-4 offset-xl-4 img-fluid" src="resources/img/sport_track.png" />

                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-10 offset-1 col-md-6 offset-md-0">
                                            <div class="form-group">
                                                <label>Nom :</label>
                                                <input type="text" name="lastName" minlength="1" maxlength="30" class="form-control form-control-lg" value="<?php echo $_SESSION['user']['modify_information'][0]->getLastName(); ?>">
                                            </div>
                                        </div>
                                        <div class="col-10 offset-1 col-md-6 offset-md-0">
                                            <div class="form-group">
                                                <label>Prénom :</label>
                                                <input type="text" name="firstName" minlength="1" maxlength="30" class="form-control form-control-lg" value="<?php echo $_SESSION['user']['modify_information'][0]->getFirstName(); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-10 offset-1 col-md-6 offset-md-0">
                                            <div class="form-group">
                                                <label>Date de naissance :</label>
                                                <input type="date" name="birthday" class="form-control form-control-lg" value="<?php echo $_SESSION['user']['modify_information'][0]->getBirthday(); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-10 offset-1 col-md-6 offset-md-0">
                                            <div class="form-group">
                                                <label>Genre :</label>
                                                <input type="text" name="gender" minlength="1" maxlength="50" class="form-control form-control-lg" value="<?php echo $_SESSION['user']['modify_information'][0]->getGender(); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-10 offset-1 col-md-6 offset-md-0">
                                            <div class="form-group">
                                                <label>Taille (cm) :</label>
                                                <input type="number" name="height" min="1" class="form-control form-control-lg" value="<?php echo $_SESSION['user']['modify_information'][0]->getHeight(); ?>">
                                            </div>
                                        </div>
                                        <div class="col-10 offset-1 col-md-6 offset-md-0">
                                            <div class="form-group">
                                                <label>Masse (kg) :</label>
                                                <input type="number" name="weight" min="1" class="form-control form-control-lg" value="<?php echo $_SESSION['user']['modify_information'][0]->getWeight(); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-10 offset-1 col-md-6 offset-md-0">
                                            <div class="form-group">
                                                <label>Email :</label>
                                                <input type="email" name="email" minlength="1" maxlength="50" class="form-control form-control-lg" value="<?php echo $_SESSION['user']['modify_information'][0]->getEmail(); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-10 offset-1 col-md-6 offset-md-0">
                                            <div class="form-group">
                                                <label>Mot de passe :</label>
                                                <input type="password" name="pwd" minlength="6" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="page" value="modify_account">
                                    <div class="row mt-3">
                                        <div class="col-md-6 offset-md-0 mb-2 d-none d-md-block">
                                            <a style="cursor: pointer; color: white;" onclick="document.getElementById('submit-return').submit();" class="btn btn-block btn-primary return">Retour</a>
                                        </div>
                                        <div class="col-10 offset-1 col-md-6 offset-md-0 mb-2">
                                            <button type="submit" class="btn btn-block btn-primary">Enregistrer</button>
                                        </div>
                                        <div class="mt-3 col-10 offset-1 mb-2 d-block d-md-none">
                                            <a style="cursor: pointer; color: white;" onclick="document.getElementById('submit-return').submit();" class="btn btn-block btn-primary return">Retour</a>
                                        </div>
                                    </div>
                                </form>
                                <form id="submit-return" action="" method="post">
                                    <input type="hidden" name="page" value="/">
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

unset($_SESSION['user']['modify_information']);

?>