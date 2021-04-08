<?php include "header.php" ?>

<?php

require "./Utils/Message.php";

$controller = new MoviesController();
$movies = $controller->index();
?>

<body>
    <nav class="nav-extended grey lighten-1">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li><a href="/">Galeria</a></li>
                <li><a href="/novo">Cadastrar</a></li>
            </ul>
        </div>
        <div class="nav-header center">
            <h1>POP FILMES</h1>
        </div>
        <div class="nav-content">
            <ul class="tabs tabs-transparent grey darken-1">
                <li class="tab"><a class="active" href="#test1">Todos</a></li>
                <li class="tab"><a href="#test2">Assistidos</a></li>
                <li class="tab"><a href="#test3">Favoritos</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <?php foreach ($movies as $movie) : ?>
            <div class="row">
                <div class="col s12 m6 l3">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="<?= $movie->poster ?>">
                            <button class="btn-fav btn-floating halfway-fab waves-effect waves-light red" data-id="<?= $movie->id ?>">
                                <i class="material-icons">
                                <?= ($movie->favorites)?"favorite": "favorite_border" ?>
                                </i>
                            </button>
                        </div>
                        <div class="card-content">
                            <p class="valign-wrapper">
                                <i class="material-icons amber-text">star</i> <?= $movie->note ?>
                            </p>
                            <span class="card-title activator truncate">
                                <?= $movie->title ?>
                            </span>
                            </div>
                            <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?= $movie->title ?><i class="material-icons right">close</i></span>
                            <p><?= substr($movie->synopsis, 0, 600) . "..." ?></p>
                            <button class="waves-effect waves-light btn-small right red accent-2 btn-delete" data-id="<?= $movie->id ?>"><i class="material-icons">delete</i></button>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

            <?= Message::show(); ?>

            <script src="/Assets/script.js"></script>
</body>