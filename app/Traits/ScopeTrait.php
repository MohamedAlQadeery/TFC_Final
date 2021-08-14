<?php

namespace App\Traits;

trait ScopeTrait
{
    //scopes --------------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('ar_name', 'like', "%$search%")
                    ->Orwhere('en_name', 'like', "%$search%")
                    ->Orwhere('tr_name', 'like', "%$search%");
        });
    }

    // status 1 active 2 disabled
    public function scopeWhenStatus($query, $status)
    {
        return $query->when($status, function ($q) use ($status) {
            return $q->where('status', $status);
        });
    }

    public function scopeWhenCategory($query, $category)
    {
        return $query->when($category, function ($q) use ($category) {
            return $q->where('category_id', $category);
        });
    }
}
