<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
  public function Command(): HasOne
  {
        return $this->hasOne(Command::class);
  }
}
