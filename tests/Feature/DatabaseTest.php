<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    
    public function test_db_connection_type_correct() : void 
    {
        $this->assertEquals(env('DB_CONNECTION'), "pgsql", "Wrong connection type");
    } 

    public function test_db_address_set() : void 
    {
        $this->assertIsString(env('DB_HOST'), "DB host is not set");
    } 

    public function test_db_port_set() : void 
    {
        $this->assertEquals(env('DB_PORT'), 5432, "Wrong DB port");
    } 
    
    /**
     * A basic feature test example.
     */
    public function test_db_online(): void
    {
        // $response = $this->get('/');
        // DB::query('SELECT * FROM pg_database;');
        // DB::query('SELECT datname FROM pg_database where datname = 'borealstar';');
        $dbname = DB::table('pg_database')->where('datname', 'borealstar')->value('datname');

        $this->assertIsString($dbname, "Borealstar database does not exists");
    }
}
