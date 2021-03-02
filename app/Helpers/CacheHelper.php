<?php

// Author: Achyut Neupane

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;

class CacheHelper
{
    public static function subcategory($subcategory)
    {
        $key = 'subcat_' . $subcategory->id . '_cat';
        if (Cache::has($key)) {
            return Cache::get($key);
        }

        $category = $subcategory->category()->orderBy('id', 'DESC');
        return Cache::rememberForever($key, function () use ($category) {
            return ['category_id' => $category->id, 'category_name' => $category->name];
        });
    }
}