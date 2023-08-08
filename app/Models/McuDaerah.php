<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McuDaerah extends Model
{
    use HasFactory;

    protected $table = 'vendor_temp';
    protected $guarded = [''];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
