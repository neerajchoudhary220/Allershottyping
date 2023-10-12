<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HtmlTags extends Model
{
    use HasFactory;
    protected $fillable = ['tag','description','label_id'];
}
