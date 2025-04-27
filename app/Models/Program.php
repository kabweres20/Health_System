<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    // Define the fillable attributes to allow mass assignment
    protected $fillable = ['name', 'description']; // Add other fields as needed

    // Define the relationship with clients (many-to-many)
    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
