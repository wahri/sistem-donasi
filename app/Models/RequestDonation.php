<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDonation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'donation_id', 'quantity', 'comment', 'status'];
}
