<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'room_types';
    protected $primaryKey = 'room_type_id';
    public $timestamps = true;

    protected $fillable = [
        'room_type_name',
        'room_type_description',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_type_id', 'room_type_id');
    }
}
