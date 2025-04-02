<?php
function renderTemplate($templateFile, $templateFileBusinessEntity, $data): array|false|string
{
    $template = file_get_contents($templateFile);

    $business_entity_template = file_get_contents($templateFileBusinessEntity);
    $hotelsHtml = "";

    foreach ($data as $hotel) {
        $tmp = str_replace("{{name}}", $hotel['name'], $business_entity_template);
        $tmp2 = str_replace("{{description}}", $hotel['description'], $tmp);
        $tmp3 = str_replace("{{image}}", $hotel['image'], $tmp2);
        $hotelsHtml .= str_replace("{{score}}", $hotel['score'], $tmp3);
    }

    return str_replace("{{HOTEL}}", $hotelsHtml, $template);
}

$hotels = [
    ["name" => "Hotel Sacher, Vienna", "description" => "A legendary luxury hotel famous for the original Sachertorte.", "image" => "../src/18-BEL-03963-0048---Bellagio-Hero-Shot---Resize-v00PP.webp", "score" => "9.2"],
    ["name" => "Hotel Imperial, Vienna", "description" => "A 5-star palace hotel offering a royal experience since 1873.", "image" => "../src/welcome-to-caesars-palace.jpg", "score" => "5.6"],
    ["name" => "Schloss Fuschl, Salzburg", "description" => "A stunning lakeside castle hotel with breathtaking Alpine views.", "image" => "../src/283163011.jpg", "score" => "0.8"],
    ["name" => "Aqua Dome, Tyrol", "description" => "A world-famous spa resort surrounded by the Ötztal Alps.", "image" => "../src/283163011.jpg", "score" => "9.8"],
    ["name" => "Biohotel Daberer, Carinthia", "description" => "A sustainable, eco-friendly retreat focused on organic wellness.", "image" => "../src/18-BEL-03963-0048---Bellagio-Hero-Shot---Resize-v00PP.webp", "score" => "9.1"]
];

echo renderTemplate("../public/Prototype_us3.html", "../public/business_entity.html", $hotels);
