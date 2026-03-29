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

        <?php $this->include("navbar"); ?>

        <section>
            <div class="container text-center newContainer">
                <div class="row">
                    <div class="col-md-4 order-md-1 order-3">
                        <div class="pokemonSpritesContainer">
                            <div class="pokemonSprites width-101">
                                <?php for($i = 1; $i <= 1025; $i++) { ?>
                                    <form method="GET" action="">
                                        <div class="spriteContainer">
                                            <button type="submit" name="pokemonId" value="<?php echo $i; ?>">
                                                <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/<?php echo $i; ?>.png"/>
                                            </button>
                                        </div>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 order-md-2 order-1 responsivePadding">
                        
                        <h1 class="pokemonName"><?php if(core\Session::exists('pokemonName') ) { echo ucfirst(core\Session::get('pokemonName')); } else { echo 'Bulbasaur'; } ?></h1>
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/<?php if(!empty($pokemonId) ) { echo $pokemonId; } else { echo '1'; } ?>.png" class="w-75 shuntImageNew"/>

                    </div>
                    <div class="col-md-4 order-2">
                        <form method="POST" action="">
                            <label class="form-label float-start mb-3"><b>Handheld:</b></label>
                            <select name="handheldId" class="form-select handhelds <?php if(!empty(validation\Errors::get($rules, 'handheldId'))) { echo 'is-invalid'; } ?>" size="3">
                                <option value="1">GBC</option>
                                <option value="2">GBA</option>
                                <option value="3">DS / DS Lite</option>
                                <option value="4">3DS</option>
                                <option value="5">Switch</option>
                            </select>
                            <label class="form-labe float-start mb-3"><b>Game:</b></label>
                            <select name="gameId" class="form-select games <?php if(!empty(validation\Errors::get($rules, 'gameId'))) { echo 'is-invalid'; } ?>" size="10">
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
                                <option value="21">Pokemon Omega Ruby</option>
                                <option value="22">Pokemon Alpha Saphire</option>
                                <option value="23">Pokemon Sun</option>
                                <option value="24">Pokemon Moon</option>
                                <option value="25">Pokemon Ultra Sun</option>
                                <option value="26">Pokemon Ultra Moon</option>
                                <option value="27">Pokemon Sword</option>
                                <option value="28">Pokemon Shield</option>
                                <option value="29">Pokemon Brilliant Diamond</option>
                                <option value="30">Pokemon Shining Pearl</option>
                                <option value="31">Pokemon Legends Arceus</option>
                                <option value="32">Pokemon Scarlet</option>
                                <option value="33">Pokemon Violet</option>
                                <option value="34">Pokemon Legends Z-A</option>
                            </select>
                            <input type="submit" name="submit" value="Select" class="btn btn-secondary selectButton"/>
                        </form>
                    </div>
                </div>
            </div>

        <section>
    </body>
</html> 