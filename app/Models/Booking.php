<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'counter', 'user_id', 'service_id', 'used', 'status' // status = 0 not active , status = 1 active
    ];

    protected $appends = ['status_text']; 

    /**
     * Relationship
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /** 
     * accessors
     */
    public function getStatusTextAttribute()
    {
        $arr = [1 => 'غير فعال', 0 => 'فعال'];
        return $arr[$this->status];
    }
}
