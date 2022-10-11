<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    protected $table = 'magazines';

    protected $primaryKey = 'magazineid';

    public function user()
    {
        return $this->belongsTo('App\Company');
    }
}
