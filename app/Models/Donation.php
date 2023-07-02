<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Donation extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id', 'name', 'image', 'description', 'stock', 'unit', 'status', 'expired_donation'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    function requestDonation() {
        return $this->hasMany(RequestDonation::class);
    }
}
