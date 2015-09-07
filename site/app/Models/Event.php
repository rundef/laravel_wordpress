<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $attributes = [
	   'active' => 1,
	];
}