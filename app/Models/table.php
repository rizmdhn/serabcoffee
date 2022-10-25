<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table extends Model
{
    use HasFactory;
    protected $table = 'table';

    protected $fillable = [
        'table_number',
        'customer_name',
        'entry_time',
    ];
}
