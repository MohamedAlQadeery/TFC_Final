<?php

namespace App\Models;

use App\Traits\AccessorsTrait;
use App\Traits\ScopeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Food extends Model implements HasMedia
{
    use HasFactory;
    use ScopeTrait;
    use InteractsWithMedia;
    use AccessorsTrait;

    protected $guarded = [];
    protected $appends = ['status_name', 'dashlang_name', 'lang_name', 'lang_desc'];
    protected $primarykey = 'id';

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(720)
              ->height(720)
              ->sharpen(10);
    }

    //relationships

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    //end of relationships
}
