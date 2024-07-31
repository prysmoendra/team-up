<?php
$page = filter_input(INPUT_GET, "page", FILTER_DEFAULT);
$layout = $page ?? "page_home";

if(!include("./app/{$layout}.php")){
    echo("<h1>404:Page not found</h1>");
};
?>