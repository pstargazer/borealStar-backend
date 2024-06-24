<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MStaack\LaravelPostgis\Eloquent\PostgisTrait;

class Spot extends Model
{
    use HasFactory, PostgisTrait;

    // public function newCollection($models) {
    // }

    public function toArray(){
        return [
            "id" => $this->id,
            "names" => $this->names,
            "coordinates" => $this->coordinates,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }

    public $fillable = ['coordinates', "names"];
    public $postgisFields = ['coordinates'];
}
