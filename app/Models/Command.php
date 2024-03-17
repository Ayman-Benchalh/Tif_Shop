<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Command extends Model
{
    use HasFactory;

    protected $table='commands';
    protected $primaryKey='idCommand';
    protected $foreignkey=['idProduct'];


    protected $fillable=[
        'idProduct',
        'idUser',
        'quantite',
        'dateCommand',
        'statut',
        'Size',
        'TotelPrix',
    ];

    public function product()
    {
         return $this->belongsTo(Product::class,'idProduct');
    }    
    public function user(): HasOne
    {
          return $this->hasOne(User::class,'idUser');
    }
}
