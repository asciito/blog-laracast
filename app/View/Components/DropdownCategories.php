<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class DropdownCategories extends Component
{
    public function render()
    {
        $categories = Category::all();

        return view('components.dropdown-categories', [
            'categories' => $categories,
            'currentCategory' => $categories->firstWhere('slug', value:request('category')),
        ]);
    }
}
