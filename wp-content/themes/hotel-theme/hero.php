<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

    $heroTitle = get_field("hero_title");
    $heroParagraph = get_field("hero_paragraph");
    $heroButton = get_field("hero_button");
    $heroImage = get_field("hero_image");
?> 



    <div class="container-hero">
        <div class="container-hero-overlay"></div>
        <div class="container-hero-content">
            <h1><?= get_field("hero_title")?> </h1>
            <p> <?= get_field("hero_paragraph")?></p>
            <button class="hero-btn"><?= get_field("hero_paragraph")?></button>
        </div>
    </div>
    
</body>
</html>