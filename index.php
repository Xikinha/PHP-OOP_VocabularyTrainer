<?php

// Require the correct variable type to be used (no auto-converting)

declare(strict_types = 1);

// Activate session variables

session_start();

// Load your classes

require_once 'models/FrenchData.php';
require_once 'models/GermanData.php';
require_once 'models/SwedishData.php';
require_once 'models/SpanishData.php';
require_once 'models/PortugueseData.php';
require_once 'models/LanguageGame.php';
require_once 'models/Word.php';

// Start the exercise

if (!isset($_GET["language"])) {

    require 'views/home.php';

} elseif (isset($_GET["language"])) {

    $game = new LanguageGame();
    $game->run();

    require 'views/exercise.php';

}
