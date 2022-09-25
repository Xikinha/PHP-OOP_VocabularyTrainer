<?php

class LanguageGame
{
    private array $words;
    public Word $selectedWord;
    public string $message;
    public string $language;

    public function __construct()
    {
        if ($_GET["language"] === "FR") {
            foreach (FrenchData::words() as $foreignWord => $englishTranslation) {
                $this->words[] = new Word($foreignWord, $englishTranslation);
                $this->language = "(French - English)";
            }
        } elseif ($_GET["language"] === "DE") {
            foreach (GermanData::words() as $foreignWord => $englishTranslation) {
                $this->words[] = new Word($foreignWord, $englishTranslation);
                $this->language = "(German - English)";
            }
        } elseif ($_GET["language"] === "SE") {
            foreach (SwedishData::words() as $foreignWord => $englishTranslation) {
                $this->words[] = new Word($foreignWord, $englishTranslation);
                $this->language = "(Swedish - English)";
            }
        } elseif ($_GET["language"] === "ES") {
            foreach (SpanishData::words() as $foreignWord => $englishTranslation) {
                $this->words[] = new Word($foreignWord, $englishTranslation);
                $this->language = "(Spanish - English)";
            }
        } elseif ($_GET["language"] === "PT") {
            foreach (PortugueseData::words() as $foreignWord => $englishTranslation) {
                $this->words[] = new Word($foreignWord, $englishTranslation);
                $this->language = "(Portuguese - English)";
            }
        }
    }

    public function getRandomWord()
    {
        $randomKey = array_rand($this->words);
        $randomWord = $this->words[$randomKey];
        return $randomWord;
    }

    public function setupGame()
    {
        $_SESSION["randomWord"] = '';

        $options = [];
        $this->selectedWord = $this->getRandomWord();
        array_push($options, $this->selectedWord->foreignWord);
        array_push($options, $this->selectedWord->translation);
        $option = array_rand($options);
        if ($option === 0) {
            $this->selectedWord = new Word($this->selectedWord->foreignWord, $this->selectedWord->translation);
            $_SESSION["randomWord"] = serialize($this->selectedWord);
        } else {
            $this->selectedWord = new Word($this->selectedWord->translation, $this->selectedWord->foreignWord);
            $_SESSION["randomWord"] = serialize($this->selectedWord);
        }
    }

    public function getGuess()
    {
        $input = $_POST["guess"];
        return $input;
    }

    public function run(): void
    {
        /// When page is loaded
        /// -> game is setup, random word is generated & displayed on the screen

        if (isset($_GET["language"]) && !isset($_POST["submit"])) {
            
            $_SESSION["correctAnswers"] = 0;
            $_SESSION["wrongAnswers"] = 3;

            $this->setupGame();
            $this->selectedWord = unserialize($_SESSION["randomWord"]);

        }

        /// When guess was submitted
        /// -> User enters translation in input field & submits answer, which is compared to stored English word

        if ((!empty($_POST["submit"]) && $_POST["submit"] === "guess")) {
                
            $userAnswer = $this->getGuess();

            $this->selectedWord = unserialize($_SESSION["randomWord"]);

            $check = new Word($this->selectedWord->foreignWord, $this->selectedWord->translation);
            $result = $check->verify($userAnswer);
    
            if ($result) {
                $_SESSION["correctAnswers"] += 1;
                $this->message = ucfirst($this->selectedWord->translation) . " is correct!";
            }
            else {
                $_SESSION["wrongAnswers"] -= 1;
                $this->message = "That's not right! The correct answer was: " . $this->selectedWord->translation;
                
                if ($_SESSION["wrongAnswers"] === 0) {
                    header( "refresh:3; url=index.php" );
                    $this->message = "That's not right! The correct answer was: " . $this->selectedWord->translation . ".<br>You ran out of lives and will be redirected to the start.";
                }
            }
        }

        /// When NEW WORD button was clicked
        /// -> game is setup again, random word is generated & displayed on the screen

        if (!empty($_POST["submit"]) && $_POST["submit"] === "new") {
            $this->setupGame();
            $this->selectedWord = unserialize($_SESSION["randomWord"]);
            $_POST["guess"] = "";
        }
        
    }
}