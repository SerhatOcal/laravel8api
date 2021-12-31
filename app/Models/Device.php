<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static where(string $string, mixed $uid)
 * @method static create(array $array)
 */
class Device extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'device';
	protected $fillable = ["uid","appId","language","operating_system","token"];
	//protected $guarded = [];

}
