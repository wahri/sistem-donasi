<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class ContributorProfile extends Model
{
    use HasFactory, HasRoles;
    protected $fillable = ['user_id', 'company', 'phone', 'address', 'map'];
}
