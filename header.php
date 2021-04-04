<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title> SISTEM PAKAR BALITA</title>
        <link rel="icon" type="image/png" href="assets_web/img/favicon.png" />

        <!--Core CSS -->
        <link rel="stylesheet" href="assets_web/css/bulma.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets_web/css/core.css">
        <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">

    </head>
    <body>
    <?php session_start(); ?>
    <?php include 'koneksi.php'; ?>
        <div id="preloader">
            <div id="status"></div>
        </div>        
        <section class="hero is-fullheight is-default is-bold">
<nav class="navbar is-fresh is-transparent no-shadow" role="navigation" aria-label="main navigation">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="index.php">
                            <b>SISTEM PAKAR BALITA</b>
                        </a>
                    </div>
            
                    <div id="navbar-menu" class="navbar-menu is-static">
                        <div class="navbar-end">
                            <a href="index.php" class="navbar-item is-secondary">
                            HOME
                            </a>
                            <a href="riwayat.php" class="navbar-item is-secondary">
                            RIWAYAT
                            </a>
                            <a href="data.php" class="navbar-item is-secondary modal-trigger" data-modal="auth-modal">
                            DATA
                            </a>
                            <a href="diagnosa.php" class="navbar-item is-secondary modal-trigger" data-modal="auth-modal">
                            DIAGNOSA
                            </a>
                            <a href="login.php" class="navbar-item">
                                <span class="button signup-button rounded secondary-btn raised">
                                LOGIN ADMIN
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <nav id="navbar-clone" class="navbar is-fresh is-transparent" role="navigation" aria-label="main navigation">
            <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="index.php">
                            <b>SISTEM PAKAR BALITA</b>
                        </a>
                    </div>
            
                    <div id="navbar-menu" class="navbar-menu is-static">
                        <div class="navbar-end">
                            <a href="index.php" class="navbar-item is-secondary">
                            HOME
                            </a>
                            <a href="riwayat.php" class="navbar-item is-secondary">
                            RIWAYAT
                            </a>
                            <a href="data.php" class="navbar-item is-secondary modal-trigger" data-modal="auth-modal">
                            DATA
                            </a>
                            <a href="diagnosa.php" class="navbar-item is-secondary modal-trigger" data-modal="auth-modal">
                            DIAGNOSA
                            </a>
                            <a href="login.php" class="navbar-item">
                                <span class="button signup-button rounded secondary-btn raised">
                                LOGIN ADMIN
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>