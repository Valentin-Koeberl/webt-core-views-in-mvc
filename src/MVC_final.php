<?php
function renderTemplate($templateFile, $templateFileBusinessEntity, $data): array|false|string
{
    $template = file_get_contents($templateFile);

    $business_entity_template = file_get_contents($templateFileBusinessEntity);
    $hotelsHtml = "";

    foreach ($data as $hotel) {
        $tmp = str_replace("{{name}}", $hotel['name'], $business_entity_template);
        $hotelsHtml .= str_replace("{{description}}", $hotel['description'], $tmp);
    }

    return str_replace("{{HOTEL}}", $hotelsHtml, $template);
}

// Liste zum hinzufügen anderer Hotels
$hotels = [
    ["name" => "Hotel Sacher, Vienna", "description" => "A legendary luxury hotel famous for the original Sachertorte."],
    ["name" => "Hotel Imperial, Vienna", "description" => "A 5-star palace hotel offering a royal experience since 1873."],
    ["name" => "Schloss Fuschl, Salzburg", "description" => "A stunning lakeside castle hotel with breathtaking Alpine views."],
    ["name" => "Aqua Dome, Tyrol", "description" => "A world-famous spa resort surrounded by the Ötztal Alps."],
    ["name" => "Biohotel Daberer, Carinthia", "description" => "A sustainable, eco-friendly retreat focused on organic wellness."]
];

//alles als html ausgeben
echo renderTemplate("public/Prototype_us3.html", "public/business_entity.html", $hotels);
