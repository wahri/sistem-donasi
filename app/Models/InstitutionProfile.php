<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class InstitutionProfile extends Model
{
    use HasFactory, HasRoles;
    protected $fillable = ['company', 'phone', 'address'];
}

