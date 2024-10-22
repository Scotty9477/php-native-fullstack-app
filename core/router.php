<?php
class Router {
    private $routes = [];

    public function addRoute($path, $callback) {
        $this->routes[$path] = $callback;
    }

    public function handleRequest() {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $path => $callback) {
            if ($path === $requestUri) {
                if (is_callable($callback)) {
                    return call_user_func($callback);
                } else {
                    list($controller, $method) = explode('@', $callback);
                    require_once "controller/$controller.php";
                    $controllerInstance = new $controller();
                    return call_user_func([$controllerInstance, $method]);
                }
            }
        }
        http_response_code(404);
        echo "Page non trouvée";
    }
}
?>