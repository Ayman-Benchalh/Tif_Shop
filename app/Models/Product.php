<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
  protected $fillable=[
    'imageProd',
    'nameProd',
    'desination',
    'Categories',
    'prix',
    'stars'
    
  ];
  public function command(): HasOne
  {
        return $this->HasOne(Command::class);
  }
}
