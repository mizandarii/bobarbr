<?php
session_start();
//echo "langLoader.php loaded<br>";


$availableLanguages = ['en', 'et'];  // add your supported languages here

if (isset($_GET['lang']) && in_array($_GET['lang'], $availableLanguages)) {
    $_SESSION['lang'] = $_GET['lang'];
}

$langCode = $_SESSION['lang'] ?? 'et';

if (!in_array($langCode, $availableLanguages)) {
    $langCode = 'et';  // fallback to default if invalid
}

$langFile = __DIR__ . "/lang/$langCode.php";

if (!file_exists($langFile)) {
    // Optional: show a friendly error or fallback to default language file
    die("Language file for '{$langCode}' not found.");
}

$lang = include $langFile;
function buildLangUrl($langCode) {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);  // safer and accurate path
    $query = $_GET;                // current query parameters

    $query['lang'] = $langCode;   // override or add language
    $queryString = http_build_query($query);

    return $path . '?' . $queryString;
}
//echo "LangCode = $langCode<br>";
//echo "LANG = " . print_r($lang, true) . "<br>";
?>