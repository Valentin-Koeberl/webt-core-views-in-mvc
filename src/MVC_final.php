<?php

require_once "Hotel.php";
function renderTemplate($templateFile, $templateFileBusinessEntity, $data): array|false|string
{
    $template = file_get_contents($templateFile);

    $business_entity_template = file_get_contents($templateFileBusinessEntity);
    $hotelsHtml = "";

    foreach ($data as $hotel) {
        $tmp = str_replace("{{name}}", $hotel->getName(), $business_entity_template);
        $tmp2 = str_replace("{{description}}", $hotel->getDescription(), $tmp);
        $tmp3 = str_replace("{{image}}", $hotel->getImage(), $tmp2);
        $hotelsHtml .= str_replace("{{score}}", $hotel->getScore(), $tmp3);
    }

    return str_replace("{{HOTEL}}", $hotelsHtml, $template);
}

$hotels = [
    new Hotel("Hotel Sacher, Vienna", "A legendary luxury hotel famous for the original Sachertorte.", "../src/18-BEL-03963-0048---Bellagio-Hero-Shot---Resize-v00PP.webp", "9.2"),
    new Hotel( "Hotel Imperial, Vienna", "A 5-star palace hotel offering a royal experience since 1873.", "../src/welcome-to-caesars-palace.jpg", "5.6"),
    new Hotel( "Schloss Fuschl, Salzburg", "A stunning lakeside castle hotel with breathtaking Alpine views.", "../src/283163011.jpg", "0.8"),
    new Hotel( "Aqua Dome, Tyrol", "A world-famous spa resort surrounded by the Ötztal Alps.", "../src/283163011.jpg", "9.8"),
    new Hotel("Biohotel Daberer, Carinthia", "A sustainable, eco-friendly retreat focused on organic wellness.", "../src/18-BEL-03963-0048---Bellagio-Hero-Shot---Resize-v00PP.webp", "9.1")
];

echo renderTemplate("../public/Prototype_us3.html", "../public/business_entity.html", $hotels);
