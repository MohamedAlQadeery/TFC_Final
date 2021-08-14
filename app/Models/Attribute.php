<?php

namespace App\Models;

use App\Traits\AccessorsTrait;
use App\Traits\ScopeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    use ScopeTrait;
    use AccessorsTrait;

    protected $guarded = [];
    protected $primarykey = 'id';
    protected $appends = ['lang_name', 'dashlang_name'];
}
