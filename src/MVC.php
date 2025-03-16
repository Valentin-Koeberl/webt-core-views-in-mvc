<?php
// Define our hotel data
$hotels = [
    [
        'name' => 'Bellagio Hotel and Casino',
        'image' => '18-BEL-03963-0048---Bellagio-Hero-Shot---Resize-v00PP.webp',
        'link' => 'https://bellagio.mgmresorts.com/en.html',
        'score' => '9.2',
        'rating' => 'Exceptional',
        'description' => 'The Bellagio is famous for its elegant fountains, fine art gallery, and luxury accommodations.
                    The choreographed water feature known as the "Fountains of Bellagio" performs a magnificent display
                    set to light and music.'
    ],
    [
        'name' => 'Caesars Palace',
        'image' => 'welcome-to-caesars-palace.jpg',
        'link' => 'https://www.caesars.com/caesars-palace',
        'score' => '8.8',
        'rating' => 'Excellent',
        'description' => 'Caesars Palace is a legendary Las Vegas hotel with a Roman Empire theme. Known for its opulent
                    design and star-studded entertainment history, it features the Forum Shops, a sprawling luxury mall,
                    and the Colosseum.'
    ],
    [
        'name' => 'The Venetian Resort',
        'image' => '283163011.jpg',
        'link' => 'https://www.venetianlasvegas.com/',
        'score' => '9.0',
        'rating' => 'Superb',
        'description' => 'The Venetian Resort recreates the charm of Venice, complete with indoor canals where guests can
                    enjoy gondola rides. It\'s one of the largest hotel complexes in the world, featuring an impressive
                    replica of St. Mark\'s Square and the Grand Canal Shoppes.'
    ]
];

// Page title and intro content using HEREDOC
$pageTitle = 'The Most Famous Hotels of the Las Vegas Strip';
$pageSubtitle = 'Discover luxury, entertainment, and world-class amenities';

$introText = <<<EOT
Las Vegas is renowned for its luxurious and themed hotels that line the famous Strip.
These architectural marvels offer much more than just accommodation - they're complete entertainment
destinations featuring world-class dining, spectacular shows, extensive shopping, and of course,
casino gaming. Explore some of the most iconic hotels below.
EOT;

$footerText = '© 2025 Las Vegas Strip Hotels Guide. All information is provided for informational purposes only.';

// Function to read template file
function getTemplate($filename) {
    $file = fopen($filename, 'r');
    $content = fread($file, filesize($filename));
    fclose($file);
    return $content;
}

// Function to replace placeholders in a template
function renderTemplate($template, $placeholders) {
    foreach ($placeholders as $placeholder => $value) {
        $template = str_replace("{{" . $placeholder . "}}", $value, $template);
    }
    return $template;
}

// Read the HTML template file
$template = getTemplate('Prototype_with_Tags.html');

// Create an array of placeholders and their values
$placeholders = [
    'page_title' => $pageTitle,
    'page_subtitle' => $pageSubtitle,
    'intro_text' => $introText,
    'footer_text' => $footerText
];

// Add hotel-specific placeholders for each hotel
foreach ($hotels as $index => $hotel) {
    $hotelNum = $index + 1;
    $placeholders["hotel{$hotelNum}_name"] = $hotel['name'];
    $placeholders["hotel{$hotelNum}_image"] = $hotel['image'];
    $placeholders["hotel{$hotelNum}_alt"] = $hotel['name'];
    $placeholders["hotel{$hotelNum}_link"] = $hotel['link'];
    $placeholders["hotel{$hotelNum}_score"] = $hotel['score'];
    $placeholders["hotel{$hotelNum}_rating"] = $hotel['rating'];
    $placeholders["hotel{$hotelNum}_description"] = $hotel['description'];
}

// Replace all placeholders in the template
$renderedPage = renderTemplate($template, $placeholders);

// Output the complete page
echo $renderedPage;
?>