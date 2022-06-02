<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;
    protected $table ='planning';
    protected $filable = [
        'heureDepart',
        'heureFin',
        'prix'
    ];
}
