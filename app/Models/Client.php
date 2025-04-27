<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'name',  // Add 'name' to the fillable property
        'age',   // Add 'age' to the fillable property
    ];

    // Define the relationship with programs
    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }
}
