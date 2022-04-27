<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class card_model extends Model
{
    use HasFactory;

    protected $table = 'card_content';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
}
