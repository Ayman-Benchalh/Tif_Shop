<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Command extends Model
{
    use HasFactory;
    protected $fillable=[
        'idProduct',
        'idUser',
        'quantitePro',
        'dateCommand',
        'statut'
        
      ];
    public function User(): HasOne
    {
          return $this->hasOne(User::class);
    }
    public function Product(): HasMany
    {
          return $this->HasMany(Product::class);
    }
}
