<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?= isset($title) ? $title : '' ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_uri('/styles/styles.css') ?>">
</head>

<body class="page-<?= isset($page) ? $page : 'default' ?>">
    <header class="<?= (isset($page) && $page == 'login') ? 'hidden' : '' ?>">
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-header" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">My Blog</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-header">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="home">Home</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                        <li>
                            <a href="login">Login</a>
                        </li>
                        <li>
                            <a href="register">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
