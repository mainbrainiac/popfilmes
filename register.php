<?php include "header.php" ?>

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
    </nav>

    <div class="row">
        <form method="POST">
            <div class="col s6 offset-s3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Cadastrar Filme</span>

                        <!-- input do titulo -->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="title" type="text" class="validate" name="title" required>
                                <label for="title">Título do filme</label>
                            </div>
                        </div>

                        <!-- input sinopse -->
                        <div class="row">
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="synopsis" class="materialize-textarea" name="synopsis"></textarea>
                                    <label for="synopsis">Sinopse</label>
                                </div>
                            </div>
                        </div>

                        <!-- input nota -->
                        <div class="row">
                            <div class="input-field col s4">
                                <input id="note" type="number" step=".1" min="0" max="10" class="validate" name="note" required>
                                <label for="note">Nota</label>
                            </div>
                        </div>

                        <!--input capa -->
                        <div class="file-field input-field">
                            <div class="btn red lighten-2 black-text">
                                <span>Capa</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate " name="poster" type="text" required>
                            </div>
                        </div>


                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn grey" href="/">Cancelar</a>
                        <button type="submit" class="waves-effect waves-light btn red">Confirmar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>