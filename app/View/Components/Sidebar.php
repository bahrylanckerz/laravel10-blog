<?php

namespace App\View\Components;

use Closure;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class Sidebar extends Component
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
        $posts = Post::query()
            ->where('active', '=', 1)
            ->whereDate('published_at', '<', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(5);
            
        $categories = Category::query()
            ->select('categories.title','categories.slug', DB::raw('count(*) as total'))
            ->join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->groupBy('categories.id')
            ->orderByDesc('total')
            ->get();
        return view('components.sidebar', compact('categories', 'posts'));
    }
}
