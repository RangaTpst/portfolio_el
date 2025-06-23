<?php

namespace Core;

class Router
{
    private array $routes = [];

    public function get(string $path, callable $callback): void
    {
        $this->addRoute('GET', $path, $callback);
    }

    public function post(string $path, callable $callback): void
    {
        $this->addRoute('POST', $path, $callback);
    }

    private function addRoute(string $method, string $path, callable $callback): void
    {
        // Transforme {param} en regex
        $pattern = preg_replace('#\{([a-zA-Z0-9_]+)\}#', '(?P<$1>[^/]+)', $path);
        $pattern = '#^' . rtrim($pattern, '/') . '/?$#'; // supporte trailing slash

        $this->routes[$method][] = [
            'pattern' => $pattern,
            'callback' => $callback
        ];
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        // Récupère l'URI sans les paramètres GET
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Retire le chemin de base (ex : /portfolio_elisa/public)
        $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
        if (str_starts_with($uri, $base)) {
            $uri = substr($uri, strlen($base));
        }

        $uri = '/' . ltrim($uri, '/');

        if (!empty($this->routes[$method])) {
            foreach ($this->routes[$method] as $route) {
                if (preg_match($route['pattern'], $uri, $matches)) {
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                    call_user_func_array($route['callback'], $params);
                    return;
                }
            }
        }

        // Pas trouvé : 404
        http_response_code(404);
        echo "<h1>404 - Page non trouvée</h1>";
    }
}
