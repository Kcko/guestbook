<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */

use Nette\Configurator;


/*
 * Příprava a vytvoření DI kontejneru
 */

# Načteme třídy Nette
require __DIR__ . '/../vendor/autoload.php';

# Vytvoříme nový konfigurátor
$configurator = new Configurator;

# Povolíme ladící a logovací funkce
//$configurator->setDebugMode(TRUE);  # vynutí debug mód i na produkčním serveru
$configurator->enableDebugger(__DIR__ . '/../log');

// Nastavíme odkládací adresář
$configurator->setTempDirectory(__DIR__ . '/../temp');

# Zapneme a nakonfigurujeme RobotLoader
$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->addDirectory(__DIR__ . '/../vendor/others')
	->register();

# Načteme konfigurační soubory
$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon');

# Z připraveného konfigurátoru vytvoříme a vrátíme DI kontejner
$container = $configurator->createContainer();

return $container;