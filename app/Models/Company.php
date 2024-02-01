<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Company extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = [
        'name',
        'description',
        'sector',
        'logo',
        'location',
    ];


   

    public function announcements(){
        return $this->hasMany(Announcement::class);
    }

    public function logo()
    {
        return $this->hasOne(Media::class, 'model_id')
                   ->where('collection_name', 'logos');
    }


}
