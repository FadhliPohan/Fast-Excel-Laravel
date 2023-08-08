<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McuDaerahMapping extends Model
{
    use HasFactory;
    protected $table = 'vendor_emp_medical_record_det_tab';
    protected $guarded = [''];
    protected $primaryId = 'id';
    public $timestamps = false;
}
