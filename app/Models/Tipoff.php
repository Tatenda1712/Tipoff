<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipoff extends Model
{
    use HasFactory;
    protected $fillable = [
    'tipoff',
    'likes',
    'share'];
    public function comments()
    {
    	return $this->hasMany(Comment::class,"tip_id","id");
    }
}