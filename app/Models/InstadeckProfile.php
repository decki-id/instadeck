<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstadeckProfile extends Model
{
    protected $guarded = [];
    
    public function profileImage()
    {
        $dhsImagePath = ($this->image) ? $this->image : '/profile/default_user.png';
        return '/storage/' . $dhsImagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
