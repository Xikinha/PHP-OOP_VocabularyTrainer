<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Vocabulary trainer</title>
    <link rel="stylesheet" href="resources/styles.css?v=<?php echo time(); ?>">
</head>
<body>
    <div id="updates">
        <div class="update">
            <p class="result"><?php if(isset($_SESSION["correctAnswers"])) {echo $_SESSION["correctAnswers"];}?></p>
            <img style="height: 2rem;" src="resources/assets/owl.png" alt="Icon of brown owl">
        </div>
        <div class="update">
            <p class="result"><?php if(isset($_SESSION["wrongAnswers"])) {echo $_SESSION["wrongAnswers"];}?></p>
            <img style="height: 2rem;" src="resources/assets/heart.png" alt="Icon of red heart">
        </div>
    </div>

    <h3>Translate this word </h3>
    <p><?php if(!empty($_GET["language"])) {echo $game->language;} ?></p>

    <div id="foreignWordBox">
        <p id="foreignWord"><?php if(isset($game->selectedWord->foreignWord)) {echo $game->selectedWord->foreignWord;} ?></p>
    </div>
    
    <form method="POST">
        <input id="guessField" type="text" name="guess" value="<?php if(isset($_POST["guess"])) {echo $_POST["guess"];}  ?>">
        <div>
            <button id="btn-form" type="submit" name="submit" value="guess">CHECK</button>
        </div>
        <div>
            <button id="btn-form" type="submit" name="submit" value="new">NEW WORD</button>
        </div>
    </form>

    <p id="message"><?php if(isset($game->message)) {echo $game->message;}  ?></p>

</body>
</html>