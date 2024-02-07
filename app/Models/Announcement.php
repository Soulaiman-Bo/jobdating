<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Announcement extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;
    protected $fillable = [
        'title',
        'company_id',
        'description',
        'image',
        'skills'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function image()
    {
        return $this->hasOne(Media::class, 'model_id')
            ->where('collection_name', 'images');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
