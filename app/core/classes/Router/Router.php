<?php

namespace Router;

class Router {

    /**
     * Routes
     * Array of available routes
     */
    private $routes     = [];

    /**
     * Route
     * Current route
     */
    private $route      = [];

    /**
     * Index
     * Array of segments in current route
     */
    private $index      = [];

    /**
     * Not Found
     * Route for 404 error page
     */
    private $not_found  = '404';

    /**
     * Construct
     * Set default path & index
     */
    public function __construct() {
        $this->route = ['route' => (isset($_GET['path']) ? rtrim($_GET['path'], '/') : 'homepage')];
        $this->setindex();

        // Core routes
        $this->addRoutes([
            $this->not_found => [
                $this->not_found,
            ],
            'homepage' => [
                'homepage'
            ]
        ]);
    }

    /**
     * Add Route
     */
    public function addRoute( $route, $view = false, $controller = false ) {
        if ( !array_key_exists($route, $this->routes) ) {
            $this->routes[$route] = [
                'route' => $route,
                'view' => $view,
                'controller' => $controller
            ];
        }
    }

    /**
     * Add Routes
     * Add an array of routes
     */
    public function addRoutes( $routes ) {
        if ( !is_array($routes) ) {
            return false;
        } else {
            foreach ( $routes as $route ) {
                $route[1] = (isset($route[1]) ? $route[1] : false);
                $route[2] = (isset($route[2]) ? $route[2] : false);

                $this->addRoute($route[0], $route[1], $route[2]);
            }
        }
    }

    /**
     * Get Routes
     * Return array of available routes
     */
    public function getRoutes() {
        return $this->routes;
    }

    /**
     * Do Route
     * Override the browser URL
     */
    public function doRoute( $route ) {
        if ( is_string($route) && $this->hasRoute($route) ) {
            $this->route = $this->routes[$route];
        } else {
            $this->route = $this->routes[$this->not_found];
        }

        $this->setIndex();
    }

    /**
     * Get Route
     * Get current route
     */
    public function getRoute() {
        return $this->route['route'];
    }

    /**
     * Get View
     * Get current view
     */
    public function getView() {
        return $this->route['view'];
    }

    /**
     * Get Controller
     * Get current controller
     */
    public function getController() {
        return $this->route['controller'];
    }

    /**
     * Is Route
     */
    public function isRoute( $route ) {
        return $route === $this->route['route'];
    }

    /**
     * Has Route
     */
    public function hasRoute( $route ) {
        return array_key_exists($route, $this->routes);
    }

    /**
     * Set Index
     */
    public function setIndex( $route = false ) {
        if ( $route === false ) {
            $route = $this->route;
        }

        $this->index = explode('/', $route['route']);
    }

    /**
     * Get Index
     * Get current route index
     */
    public function getIndex( $key = false ) {
        if ( $key !== false ) {
            return $this->index[$key];
        } else {
            return $this->index;
        }
    }

    /**
     * Has Index
     */
    public function hasIndex( $key ) {
        return array_key_exists($key, $this->index);
    }

}
