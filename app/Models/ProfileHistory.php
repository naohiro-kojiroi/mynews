<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileHistory extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    protected static $rules = array(
        'plofile_id' => 'required',
        'edited_at' => 'required',
        );
}
