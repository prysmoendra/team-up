<?php
include("./template/header.html");
?>

<?php
$page = filter_input(INPUT_GET, "page", FILTER_DEFAULT);
$layout = $page ?? "page_home";

if(!include("./template/layout/{$layout}.html")){
    echo("<h1>404:Page not found</h1>");
};
?>

<?php
include("./template/footer.html");
?>