<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Resident;
use App\Models\User;

class Certificate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'resident_id',
        'type',
        'purpose',     
        'valid_until',     
        'issued_by',
        'issued_at'
    ];

    protected $casts = [
        'issued_at' => 'datetime',
        'valid_until' => 'date', 
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function issuer()
    {
        return $this->belongsTo(User::class, 'issued_by');
    }
}