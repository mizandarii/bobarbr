<?php
//session_start();

$availableLanguages = ['en', 'et'];

if (isset($_GET['lang']) && in_array($_GET['lang'], $availableLanguages)) {
    $_SESSION['lang'] = $_GET['lang'];
}

$langCode = $_SESSION['lang'] ?? 'et';

if (!in_array($langCode, $availableLanguages)) {
    $langCode = 'et';
}

$langFile = __DIR__ . "/lang/$langCode.php";

if (!file_exists($langFile)) {
    die("Language file for '{$langCode}' not found.");
}

$lang = include $langFile;

if (!function_exists('buildLangUrl')) {
    function buildLangUrl($langCode) {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $query = $_GET;
        $query['lang'] = $langCode;
        $queryString = http_build_query($query);
        return $path . '?' . $queryString;
    }
}
