<?php


$routes = [];


function route(string $path, callable $callback){
    global $routes;
    $routes[$path] = $callback;
}

function run(){
    global $routes;
    $uri = $_SERVER["REQUEST_URI"];
    $found = false;
    foreach($routes as $path => $callback){
        if($uri !== $path) continue;
        $found = true;
        $callback();
    }
}

route('/', function(){
    echo "Home Page";
});

route('/register', function(){
    echo "Welcome to the registration page";
});

route('/about', function(){
    header("Location: about.html");
    exit();
});

route('/redi', function(){
    header("Location: https://www.youtube.com/watch?v=8J_XjOdA3so&list=RDMMkmL8VakXiqc&index=4");
    exit();
});

run();




?>