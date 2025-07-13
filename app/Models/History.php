<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class History extends Model
{
    protected $table = 'history';

    protected $fillable = [
        'user_id',
        'generated_number',
        'credits_used',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

}
