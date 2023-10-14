<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandList extends Model
{
    use HasFactory;
    protected $connection = "sqlite1";
    // protected $table = "commandlist";

    protected $fillable = ['technique_id', 'name', 'command','id'];


    public function technique()
    {
        return $this->belongsTo(Technique::class, 'technique_id');
    }
    public $timestamps = false;
}
