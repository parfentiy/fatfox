<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RandomUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender',
        'name_title',
        'name_first',
        'name_last',
        'l_street_number',
        'l_street_name',
        'l_city',
        'l_state',
        'l_country',
        'l_postcode',
        'l_coord_lat',
        'l_coord_long',
        'l_tzone_offset',
        'l_tzone_desc',
        'email',
        'login_uuid',
        'login_username',
        'login_password',
        'login_salt',
        'login_md5',
        'login_sha1',
        'login_sha256',
        'dob_date',
        'dob_age',
        'reg_date',
        'reg_age',
        'phone',
        'cell',
        'id_name',
        'id_value',
        'pic_large',
        'pic_medium',
        'pic_thumbnail',
        'nat',
    ];
}
