<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */


# Odkomentujte, pokud bude potřeba odstavit aplikaci kvůli údržbě.
// require '.maintenance.php';

# Načteme zkratky pro rychlé volání často používaných funkcí.
include __DIR__ . '/../app/aliases.php';

# Necháme bootstrap vytvořit DI kontejner.
$container = require __DIR__ . '/../app/bootstrap.php';

# Spustíme aplikaci.
$container->application->run();
