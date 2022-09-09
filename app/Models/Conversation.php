<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'last_message',

    ];

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }

    /**
     * messages
     *
     * @return void
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
