<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connexion</title>

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

                                <img class="mt-5 col-4 offset-4 col-md-2 offset-md-5 col-xl-4 offset-xl-4 img-fluid" src="resources/img/sport_track.png" />

                                <form class="mt-5" action="" method="POST">
                                    <div class="row">
                                        <div class="col-10 offset-1 col-md-6 offset-md-3">
                                            <div class="form-group">
                                                <label>Email :</label>
                                                <input type="email" name="email" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                        <div class="col-10 offset-1 col-md-6 offset-md-3">
                                            <div class="form-group">
                                                <label>Mot de passe :</label>
                                                <input type="password" name="pwd" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="page" value="user_connect">
                                    <div class="row">
                                        <div class="col-10 offset-1 col-md-6 offset-md-3 mb-2">
                                            <button type="submit" class="btn btn-block btn-primary">Connexion</button>
                                        </div>
                                    </div>
                                </form>
                                <form action="" method="POST">
                                    <input type="hidden" name="page" value="/">
                                    <div class="row">
                                        <div class="col-10 offset-1 col-md-6 offset-md-3 mt-2">
                                            <button type="submit" class="btn btn-block btn-primary return">Retour</button>
                                        </div>
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