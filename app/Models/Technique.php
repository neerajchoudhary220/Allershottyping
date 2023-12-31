<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Technique extends Model
{
    protected $connection = 'sqlite1';
    // protected $table = 'technique';
    use HasFactory;

    protected $fillable = ['name', 'description','id'];

    public $timestamps = false;

    public function commandlist()
    {
        return $this->hasMany(CommandList::class, 'technique_id');
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value)
        );
    }
}
