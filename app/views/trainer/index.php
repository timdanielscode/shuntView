<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ShuntView</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
                        <div class="pokemonSprites">
                            <?php for($i = 1; $i <= 807; $i++) { ?>
                            <form method="GET" action="/trainer/16">
                                <button type="submit" name="pokemonId" value="<?php echo $i; ?>"><img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/versions/generation-vii/ultra-sun-ultra-moon/<?php echo $i; ?>.png"/></button>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col">
                        
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/<?php echo core\Session::get('pokemonId'); ?>.png"/>

                    </div>
                    <div class="col">
                        <form method="POST" action="">
                            <select name="handheld" class="form-select" aria-label="Default select example">
                                <option value="gbc">GBC</option>
                                <option value="gba">GBA</option>
                                <option value="ds">DS / DS lite</option>
                                <option value="3ds">3DS</option>
                            </select>
                            <select name="game" class="form-select" aria-label="Default select example">
                                <option value="gold">Pokemon Gold</option>
                                <option value="silver">Pokemon Silver</option>
                                <option value="crystal">Pokemon Crystal</option>
                                <option value="leafGreen">Pokemon Leaf Green</option>
                                <option value="fireRed">Pokemon Fire Red</option>
                                <option value="ruby">Pokemon Ruby</option>
                                <option value="saphire">Pokemon Saphire</option>
                                <option value="emerald">Pokemon Emerald</option>
                                <option value="unbound">Pokemon Unbound</option>
                                <option value="diamond">Pokemon Diamond</option>
                                <option value="pearl">Pokemon Pearl</option>
                                <option value="platinum">Pokemon Platinum</option>
                                <option value="hearthGold">Pokemon Hearth Gold</option>
                                <option value="soulSilver">Pokemon Soul Silver</option>
                                <option value="black">Pokemon Black</option>
                                <option value="white">Pokemon White</option>
                                <option value="black2">Pokemon Black 2</option>
                                <option value="white2">Pokemon White 2</option>
                                <option value="x">Pokemon X</option>
                                <option value="y">Pokemon Y</option>
                                <option value="sun">Pokemon Sun</option>
                                <option value="moon">Pokemon Moon</option>
                                <option value="ultraSun">Pokemon Ultra Sun</option>
                                <option value="ultraMoon">Pokemon Ultra Moon</option>
                            </select>
                            <input type="submit" name="submit" value="submit"/>
                        </form>
                    </div>
                </div>
            </div>

        <section>
    </body>
</html> 