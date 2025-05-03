<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'banner',
        'slogan',
        'website_name',
        'email',
        'phone',
        'phone_2',
        'address',
        'zip_code',
        'country',
        'facebook',
        'youtube',
        'twitter',
        'instagram',
        'linkedin',
        'whatsapp',
    ];
}
