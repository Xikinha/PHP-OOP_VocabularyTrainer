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
    <h1 id="trainer-heading">VOCABULARY TRAINER</h1>
    <h3 id="selection-heading">Select a language to practice vocabulary</h3>
    
    <form method="GET">
        <div id="language">
            <button class="btnLanguage" type="submit" name="language" value="FR">
                <div class="flagImage"><img style="width:4rem; height:auto;" src="resources/assets/fr.svg" alt="Flag of France"></div>
                <p>French</p>
            </button>
            <button class="btnLanguage" type="submit" name="language" value="DE">
                <div class="flagImage"><img style="width:4rem; height:auto;" src="resources/assets/de.svg" alt="Flag of Germany"></div>
                <p>German</p>
            </button>
            <button class="btnLanguage" type="submit" name="language" value="PT">
                <div class="flagImage"><img style="width:4rem; height:auto;" src="resources/assets/pt.svg" alt="Flag of Portugal"></div>
                <p>Portuguese</p>
            </button>
            <button class="btnLanguage" type="submit" name="language" value="ES">
                <div class="flagImage"><img style="width:4rem; height:auto;" src="resources/assets/es.svg" alt="Flag of Spain"></div>
                <p>Spanish</p>
            </button>
            <button class="btnLanguage" type="submit" name="language" value="SE">
                <div class="flagImage"><img style="width:4rem; height:auto;" src="resources/assets/se.svg" alt="Flag of Swedish"></div>
                <p>Swedish</p>
            </button>
        </div>
    </form>
</body>
</html>