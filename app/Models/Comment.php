<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Models\Post;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'post_id'];

}
