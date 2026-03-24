<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ShuntView</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="/assets/css/style.css" rel="stylesheet">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <script defer src="/assets/js/Encounter.js" type="text/javascript"></script>
        <script defer src="/assets/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img class="px-3" src="/assets/img/logo.png" class="d-inline-block align-text-top"/>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="p-5">

            <?php if(core\Session::exists("success") === true) { ?>
                <div class="alert alert-primary text-center mt-5" role="alert">
                    <?php core\Alert::message("success"); ?>
                </div>
            <?php } ?>

            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <div class="pokemonSpritesContainer">
                            <div class="pokemonSprites">
                                <?php if(!empty($pokemon) === true) { ?>
                                    <?php foreach($pokemon as $key => $value) { ?>
                                        <form method="GET" action="/trainer/<?php echo $id[0]; ?>">
                                            <button type="submit" name="pokemonId" value="<?php echo $value['id']; ?>">
                                                <?php if($value['shiny'] === 1) { ?> 
                                                    <img class="particles" src="/assets/img/particles.png"/>
                                                <?php } ?>
                                                <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/versions/generation-vii/ultra-sun-ultra-moon/<?php if($value['shiny'] === 1) { echo 'shiny/'; } ?><?php echo $value['id']; ?>.png"/>
                                            </button>
                                            <input type="hidden" name="gameId" value="<?php echo $value['gameId']; ?>"/>
                                        </form>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>

                        <?php if(empty($pokemon) === true) { ?>

                            <a href="/trainer/<?php echo $id[0]; ?>/new" class="newShunt">Select new shunt</a>

                        <?php } ?>

                    </div>
                    <div class="col">

                        <?php if(!empty($pokemon) === true) { ?>

                            <form method="POST" action="/trainer/<?php echo $id[0]; ?>">
                                <button id="encounters" type="button" name="count" value="<?php echo $encounters['encounters']; ?>">
                                    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/<?php if($shiny === 1) { echo 'shiny/'; } ?><?php echo $pokemonId; ?>.png"/>
                                </button>
                                <input type="hidden" name="pokemonId" value="<?php echo $pokemonId; ?>"/>
                                <input type="hidden" name="gameId" value="<?php echo $gameId; ?>"/>
                                <input type="text" name="encounters" value="<?php echo $encounters; ?>" class="encountersTextField"/>
                                <input type="submit" name="save" value="Save" class="btn btn-primary saveButton"/>
                                <input type="submit" name="shiny" value="Shiny" class="btn btn-outline-primary shinyButton"/>
                            </form>

                        <?php } ?>
                    </div>
                    <div class="col">

                        <?php if(!empty($pokemon) === true) { ?>
                            <div class="pokemonSpritesContainer">
                                <div class="pokemonSprites">
                                    <?php for($i = 1; $i <= 807; $i++) { ?>
                                        <form method="GET" action="/trainer/<?php echo $id[0]; ?>/new">
                                            <button type="submit" name="pokemonId" value="<?php echo $i; ?>"><img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/versions/generation-vii/ultra-sun-ultra-moon/<?php echo $i; ?>.png"/></button>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <section>
    </body>
</html> 