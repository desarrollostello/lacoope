<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    
    public function saving(Category $cat)
    {
        // $cat->slug = Str::random(5) . '-' . Str::slug($cat->name);
    }

}
