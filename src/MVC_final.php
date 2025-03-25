<?php
function renderTemplate($templateFile, $data) {
    // Read the HTML template
    $template = file_get_contents($templateFile);

    // Generate hotel blocks dynamically using a loop
    $hotelsHtml = "";
    foreach ($data as $hotel) {
        $hotelsHtml .= <<<HOTEL
        <div class="hotel">
            <h2>{$hotel['name']}</h2>
            <p>{$hotel['description']}</p>
        </div>
        HOTEL;
    }

    // Replace placeholder in template
    return str_replace("{{HOTELS}}", $hotelsHtml, $template);
}

// Dynamic hotel list (add as many hotels as needed)
$hotels = [
    ["name" => "The Luxor", "description" => "A pyramid-shaped hotel with an Egyptian theme."],
    ["name" => "Bellagio", "description" => "Famous for its fountains and luxury rooms."],
    ["name" => "MGM Grand", "description" => "One of the largest hotels in the world."],
    ["name" => "Caesars Palace", "description" => "A Roman-themed luxury hotel with a grand casino."],
    ["name" => "The Venetian", "description" => "A Venice-inspired hotel with canals and gondolas."]
];

// Render and display the final page
echo renderTemplate("../public/Prototype_us3.html", $hotels);
