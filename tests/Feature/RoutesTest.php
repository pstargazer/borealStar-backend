<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
// use Tests\TestCase;
use PHPUnit\Framework\TestCase;
use Illuminate\Routing\Router as Router;


class RoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_checkAuthRoutes(): void
    {
/*        
        $router = new Router;
        $routes = router->getRoutes();
        $overallRoutes = count($routes);
        $routesOnline = 0;
        foreach($routes as $route){
            print_r($route);
            break;
        }
        // print_r($routes);
 */

        $this->get('/api/auth/register')->assertStatus(200);
        
    }
    public function magic() 
    {

        $response = $this->get('/test');

        $response->assertStatus(200);
    }

}
