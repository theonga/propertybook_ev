<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'title', 'content', 'image', 'parent_id'
    ];

    public function subSections()
    {
        return $this->hasMany(Section::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Section::class, 'parent_id');
    }

    public function scopeRootSections($query)
    {
        return $query->whereNull('parent_id');
    }
}
