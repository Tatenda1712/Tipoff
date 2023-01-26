<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'likes',
        'share',
        'tip_id'];
            // a parcel belongs to an order
    public function tipoffs()
    {
        return $this->belongsTo(Tipoff::class,["tip_id","id"]);
    }
}
