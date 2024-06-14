<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MStaack\LaravelPostgis\Eloquent\PostgisTrait;

class Spot extends Model
{
    use HasFactory, PostgisTrait;

    public $fillable = ['coordinates', "names"];
    public $postgisFields = ['coordinates'];
}
