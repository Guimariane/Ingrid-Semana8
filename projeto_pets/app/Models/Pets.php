<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
    use HasFactory;

    protected $table = 'pets';

    protected $fillable = ['name', 'weight', 'size', 'age', 'race_id', 'specie_id', 'client_id'];
}
