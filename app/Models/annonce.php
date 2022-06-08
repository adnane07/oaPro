<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class annonce extends Model
{
    use HasFactory;
    protected $table ='annonce';
    protected $fillable = [
        'titre',
        'description'
        
    ];

    // l annonce appratient a un seul user
    // public function User()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }
    public function users()
    {
    

        return $this->belongsTo(User::class);   
     }
   

}
