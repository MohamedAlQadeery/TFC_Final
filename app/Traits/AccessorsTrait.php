<?php

namespace App\Traits;

trait AccessorsTrait
{
    /**
     * u should append the attribute in the model for eg : $appends = ['lang_name'].
     */
    //////////////attribute
    public function getStatusNameAttribute()
    {
        return $this->status == 1 ? 'نشط' : 'غير نشط';
    }

    //name in the dashboard
    public function getLangNameAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->ar_name;
        } elseif (app()->getLocale() == 'en') {
            return $this->en_name;
        } else {
            return $this->tr_name;
        }
    }

    public function getDashlangNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->ar_name : $this->en_name;
    }

    public function getLangDescAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->ar_desc;
        } elseif (app()->getLocale() == 'en') {
            return $this->en_desc;
        } else {
            return $this->tr_desc;
        }
    }
}
