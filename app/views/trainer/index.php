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
        
        <?php $this->include("navbar"); ?>

        <section>
            <div class=" text-center">
                <div class="row">
                    <div class="col-md-4 order-md-1 order-2">

                        <h2 class="text-center mt-5 d-none"><b>Shunts</b></h2>
                        <div class="pokemonSpritesContainer">
                            <div class="pokemonSprites">
                                <?php if(!empty($pokemon) === true) { ?>
                                    <?php foreach($pokemon as $key => $value) { ?>
                                        <form method="GET" action="/trainer/<?php echo $userId[0]; ?>">
                                            <button type="submit" name="pokemonId" value="<?php echo $value['pokemonId']; ?>">
                                                <div class="spriteContainer">
                                                    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/<?php if($value['shiny'] === 1) { echo 'shiny/'; } ?><?php echo $value['pokemonId']; ?>.png"/>
                                                    <?php if($value['shiny'] === 1) { ?> 
                                                        <img class="particles" src="/assets/img/particles.png"/>
                                                    <?php } ?>
                                                </div>
                                            </button>
                                            <input type="hidden" name="ID" value="<?php echo $value['id']; ?>"/>
                                            <input type="hidden" name="gameId" value="<?php echo $value['gameId']; ?>"/>
                                            <input type="hidden" name="hp" value="<?php echo $value['hp']; ?>"/>
                                            <input type="hidden" name="def" value="<?php echo $value['def']; ?>"/>
                                            <input type="hidden" name="att" value="<?php echo $value['att']; ?>"/>
                                            <input type="hidden" name="spd" value="<?php echo $value['spd']; ?>"/>
                                            <input type="hidden" name="spa" value="<?php echo $value['spa']; ?>"/>
                                            <input type="hidden" name="spe" value="<?php echo $value['spe']; ?>"/>
                                        </form>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>

                        <?php if(empty($pokemon) === true) { ?>

                            <a href="/trainer/<?php echo $userId[0]; ?>/new" class="newShunt">Select new shunt</a>

                        <?php } ?>

                    </div>
                    <div class="col-md-4 order-md-2 order-1 responsivePadding p-5">

                        <?php if(!empty($pokemon) === true) { ?>
                            <h1 class="pokemonName"><?php echo ucfirst($pokemonName); ?></h1>
               
                            <form method="POST" action="/trainer/<?php echo $userId[0]; ?>" class="encounterForm">
                                                 <button id="encounters" type="button" name="count" value="<?php echo $encounters['encounters']; ?>">
                                <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/<?php if($shiny === 1) { echo 'shiny/'; } ?><?php echo $pokemonId; ?>.png" class="w-75 shuntImage"/>
                            </button>
                                <input type="hidden" name="ID" value="<?php echo $id; ?>"/>
                                <input type="hidden" name="gameId" value="<?php echo $gameId; ?>"/>
                                <label class="form-label d-block m-0"><b>On:</b> <?php echo $handheld; ?></label>
                                <label class="form-label d-block mb-2"><b>Pokemon:</b> <?php echo $game; ?></label>
                                <div class="form-check p-0">
                                    <label class="form-label" class="d-inline-block"><b>HP iv:</b></label>
                                    <input type="text" name="hp" value="<?php echo $hp; ?>" class="iv hpIv <?php if(!empty(validation\Errors::get($rules, 'hp'))) { echo 'is-invalid'; } ?>"/>
                                    <label class="form-label" class="d-inline-block"><b>DEF iv:</b></label>
                                    <input type="text" name="def" value="<?php echo $def; ?>" class="iv defIv ms-1 <?php if(!empty(validation\Errors::get($rules, 'def'))) { echo 'is-invalid'; } ?>"/>
                                    <label class="form-label" class="d-inline-block"><b>ATT iv:</b></label>
                                    <input type="text" name="att" value="<?php echo $att; ?>" class="iv attIv ms-1 <?php if(!empty(validation\Errors::get($rules, 'att'))) { echo 'is-invalid'; } ?>"/>
                                </div>
                                <div class="form-check p-0">
                                    <label class="form-label" class="d-inline-block"><b>SPD iv:</b></label>
                                    <input type="text" name="spd" value="<?php echo $spd; ?>" class="iv ms-1 <?php if(!empty(validation\Errors::get($rules, 'spd'))) { echo 'is-invalid'; } ?>"/>
                                    <label class="form-label" class="d-inline-block"><b>SPA iv:</b></label>
                                    <input type="text" name="spa" value="<?php echo $spa; ?>" class="iv ms-1 <?php if(!empty(validation\Errors::get($rules, 'spa'))) { echo 'is-invalid'; } ?>"/>
                                    <label class="form-label" class="d-inline-block"><b>SPE iv:</b></label>
                                    <input type="text" name="spe" value="<?php echo $spe; ?>" class="iv ms-1 <?php if(!empty(validation\Errors::get($rules, 'spe'))) { echo 'is-invalid'; } ?>"/>
                                </div>
                                <label class="form-label d-block m-0"><b>Shunt added at:</b> <?php echo date('d-m-Y H:i', strtotime($startedShuntDate) ); ?></label>
                                <label class="form-label d-block mb-3"><b>Last shunted at:</b> <?php if(date('d-m-Y H:i', strtotime($startedShuntDate) ) === date('d-m-Y H:i', strtotime($lastShuntDate) )) { echo 'Not started yet.'; } else { echo date('d-m-Y H:i', strtotime($lastShuntDate) ); } ?></label>
                                <label class="form-label d-block mb-3"><b>Encounters: </b></label>
                                <input type="text" name="encounters" value="<?php echo $encounters; ?>" class="encountersTextField <?php if(!empty(validation\Errors::get($rules, 'encounters'))) { echo 'is-invalid'; } ?>"/>
                                <input type="submit" name="save" value="Save" class="btn btn-secondary saveButton"/>
                                <input type="submit" name="shiny" value="Shiny" class="btn btn-outline-secondary shinyButton"/>
                                
                            </form>
                            <form method="POST" action="/trainer/<?php echo $userId[0]; ?>/delete" class="encounterForm">
                                <input type="hidden" name="ID" value="<?php echo $id; ?>"/>
                                <input type="submit" name="delete" value="Delete" class="btn btn-secondary deleteButton"/>
                            </form>
                        <?php } ?>
                    </div>
                    <div class="col-md-4 order-3">
                        <h2 class="text-center mt-5 d-none"><b>Start new</b></h2>
                        <?php if(!empty($pokemon) === true) { ?>
                            <div class="pokemonSpritesContainer">
                                <div class="pokemonSprites">
                                    <?php for($i = 1; $i <= 1025; $i++) { ?>
                                        <form method="GET" action="/trainer/<?php echo $userId[0]; ?>/new">
                                            <div class="spriteContainer">
                                                <button type="submit" name="pokemonId" value="<?php echo $i; ?>"><img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/<?php echo $i; ?>.png" class="pokemonSprite"/></button>
                                            </div>
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