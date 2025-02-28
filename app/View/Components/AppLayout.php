<?php

namespace App\View\Components;

use Closure;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class AppLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::query()
            ->select('categories.title', 'categories.slug', DB::raw('count(*) as total'))
            ->join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->groupBy('categories.id')
            ->orderByDesc('total')
            ->limit(5)
            ->get();
        return view('layouts.app', compact('categories'));
    }
}
