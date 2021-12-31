<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, $uid)
 */
class Purchase extends Model
{
	protected $table = 'purchase';
	protected $guarded = [];
    use HasFactory;
}
