<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    protected $table = 'password_reset_tokens'; // Specify the table name
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $fillable = ['email', 'token', 'created_at'];
}