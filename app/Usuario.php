<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
	use Notifiable;

	protected $table = 'usuario';

    protected $fillable = [
	'usuario', 'senha',
	];

	protected $hidden = [
	'senha', 'remember_token',
	];
}
