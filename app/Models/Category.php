<?php

namespace App\Models;

use App\Traits\AccessorsTrait;
use App\Traits\ScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    use InteractsWithMedia;
    use ScopeTrait;
    use AccessorsTrait;

    protected $guarded = [];
    protected $appends = ['status_name', 'dashlang_name', 'lang_name', 'lang_desc'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);

        $this->addMediaConversion('front')
            ->width(900)
            ->height(337)
            ->sharpen(10);
    }




    //start of relationships

    public function foods()
    {
        return $this->hasMany(Food::class)->where('status', 1);
    }

    //end of relationships
}
