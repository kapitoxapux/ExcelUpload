<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelDoc extends Model
{
    use HasFactory, HasEvents;

    public $timestamps = false;

    protected $table = 'rows';

    public $fillable = [
        'name',
        'date'
    ];
}
