<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = '<Dein-Github-Benutzername>'; // Dein GitHub-Benutzername
$url = "https://api.github.com/users/$username/repos";

// Dein Personal Access Token hier einfügen
$token = '<Dein-Github-Token>';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: token $token"
]);
$response = curl_exec($ch);


$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code != 200) {
    die("GitHub API Error: HTTP Status Code " . $http_code);
}

if (empty($response)) {
    die('Leere Antwort erhalten.');
}


$repos = json_decode($response, true);

echo "<h1>Meine GitHub Repositories</h1>";

if (empty($repos)) {
    echo "<p>Keine Repositories gefunden.</p>";
} else {
    echo "<div class='repo-list'>";
    foreach ($repos as $repo) {
        $repo_name = htmlspecialchars($repo['name']);
        $repo_url = "repo.php?repo=" . urlencode($repo_name);
        echo "<div class='repo-item'>
                <a href='$repo_url' class='repo-link'>$repo_name</a>
              </div>";
    }
    echo "</div>";
}
?>

<link rel="stylesheet" href="css/style.css">

<!-- Copyright Hinweis -->
<footer>
    <p style="text-align: center; color: #f5f5f5; font-size: 1em; margin-top: 40px;"><?php echo date("Y"); ?> Project by TypTech. Visit here: <a href="https://github.com/TypTech/Github-Repo-Blog" target="_blank">Github-Repo-Blog</a> </p>
</footer>
