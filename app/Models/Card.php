<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['column_id', 'title', 'description', 'position', 'due_date'];
}
