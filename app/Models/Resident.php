<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Models\User; 

class Resident extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name','middle_name','last_name','suffix',
        'gender','birthdate','place_of_birth','civil_status',
        'purok','barangay','municipality','province',
        'occupation','mobile_number',
        'voter_status','pwd_status','fourps_status',
        'resident_status',
        'monthly_income',
        'citizenship',
        'years_of_residency',
        'employment_status',
        'created_by','updated_by','archived_by'
    ];

    protected $appends = ['age'];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->birthdate)->age;
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function archiver()
    {
        return $this->belongsTo(User::class, 'archived_by');
    }
}