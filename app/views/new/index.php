<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ShuntView</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="/assets/css/style.css" rel="stylesheet">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <script defer src="/assets/js/script.js" type="text/javascript"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img class="px-3" src="/assets/logo.png" class="d-inline-block align-text-top"/>
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
                                <?php for($i = 1; $i <= 807; $i++) { ?>
                                    <form method="GET" action="">
                                        <button type="submit" name="pokemonId" value="<?php echo $i; ?>"><img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/versions/generation-vii/ultra-sun-ultra-moon/<?php echo $i; ?>.png"/></button>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        
                        <?php if(!empty($pokemonId) ) { ?>
                            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/<?php echo core\Session::get('pokemonId'); ?>.png" class="w-100"/>
                        <?php } ?>

                    </div>
                    <div class="col">
                        <form method="POST" action="">
                            <select name="handheld" class="form-select handhelds">
                                <option value="gbc">GBC</option>
                                <option value="gba">GBA</option>
                                <option value="ds">DS / DS lite</option>
                                <option value="3ds">3DS</option>
                            </select>
                            <select name="gameId" class="form-select games">
                                <option value="1">Pokemon Gold</option>
                                <option value="2">Pokemon Silver</option>
                                <option value="3">Pokemon Crystal</option>
                                <option value="4">Pokemon Leaf Green</option>
                                <option value="5">Pokemon Fire Red</option>
                                <option value="6">Pokemon Ruby</option>
                                <option value="7">Pokemon Saphire</option>
                                <option value="8">Pokemon Emerald</option>
                                <option value="9">Pokemon Unbound</option>
                                <option value="10">Pokemon Diamond</option>
                                <option value="11">Pokemon Pearl</option>
                                <option value="12">Pokemon Platinum</option>
                                <option value="13">Pokemon Hearth Gold</option>
                                <option value="14">Pokemon Soul Silver</option>
                                <option value="15">Pokemon Black</option>
                                <option value="16">Pokemon White</option>
                                <option value="17">Pokemon Black 2</option>
                                <option value="18">Pokemon White 2</option>
                                <option value="19">Pokemon X</option>
                                <option value="20">Pokemon Y</option>
                                <option value="21">Pokemon Sun</option>
                                <option value="22">Pokemon Moon</option>
                                <option value="23">Pokemon Ultra Sun</option>
                                <option value="24">Pokemon Ultra Moon</option>
                            </select>
                            <input type="submit" name="submit" value="Select" class="btn btn-primary selectButton"/>
                        </form>
                    </div>
                </div>
            </div>

        <section>
    </body>
</html> 