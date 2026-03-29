<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ShuntView</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </head>
    <body>

        <?php $this->include("navbar"); ?>
        
        <section class="p-5">
            <div class="container">
                
                <?php if(!empty(extensions\Auth::getFailedMessages() ) ) { ?>
                    <div class="alert alert-primary" role="alert">
                        <?php echo extensions\Auth::getFailedMessages(); ?>
                    </div>
                <?php } ?>

                <form method="POST" class="mt-5">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control" id="username">
                        <div class="form-text text-danger">
                            <?php if(!empty($username) ) { echo validation\Errors::get($rules, "username"); } ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                        <div class="form-text text-danger">
                            <?php if(!empty($rules) ) { echo validation\Errors::get($rules, "password"); } ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">Sign in</button>
                    <input type="hidden" name="token" value="<?php core\Csrf::token(); ?>"/>
                </form>
            </div>
        <section>
    </body>
</html> 