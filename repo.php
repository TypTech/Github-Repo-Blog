<?php
// Lade die Parsedown-Bibliothek
require_once 'Parsedown.php';

// GitHub API-URL für den Repository-Namen
$repo_name = isset($_GET['repo']) ? $_GET['repo'] : '';
$username = '<Dein-Github-Benutzername>'; // Dein GitHub-Benutzername

// Überprüfe, ob der Repository-Name angegeben wurde
if (empty($repo_name)) {
    die('Kein Repository angegeben.');
}

// URL der README.md-Datei des Repositories
$url = "https://api.github.com/repos/$username/$repo_name/readme";

// cURL Anfrage an GitHub API, um die README.md zu erhalten
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
$response = curl_exec($ch);
curl_close($ch);

// Überprüfe, ob die Anfrage erfolgreich war
if ($response === FALSE) {
    die('Fehler beim Abrufen der README.md');
}

// Die Antwort enthält Informationen über die README-Datei (in Base64 kodiert)
$data = json_decode($response, true);

// Überprüfe, ob die README-Daten vorhanden sind
if (isset($data['content'])) {
    // Base64-dekodieren des Inhalts der README.md
    $readme_content = base64_decode($data['content']);
} else {
    $readme_content = 'Keine README gefunden.';
}

// Erstelle eine Parsedown-Instanz
$parsedown = new Parsedown();

// Konvertiere das Markdown in HTML
$html_content = $parsedown->text($readme_content);

// Ausgabe des gerenderten HTML
echo "<div class='repo-details'>
        <h1>README für $repo_name</h1>
        <div class='readme-content'>$html_content</div>
        <a href='https://github.com/$username/$repo_name' target='_blank'>
            <button class='repo-button'>Zur Repository</button>
        </a>
      </div>";
?>

<!-- Link zur Stylesheet-Datei -->
<link rel="stylesheet" href="css/style.css">

<!-- Copyright Hinweis -->
<footer>
    <p style="text-align: center; color: #f5f5f5; font-size: 1em; margin-top: 40px;"><?php echo date("Y"); ?> Project by TypTech. Visit here: <a href="https://github.com/TypTech/Github-Repo-Blog" target="_blank">Github-Repo-Blog</a> </p>
</footer>
