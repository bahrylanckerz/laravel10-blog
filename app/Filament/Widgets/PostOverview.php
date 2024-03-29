<?php

namespace App\Filament\Widgets;

use App\Models\PostView;
use App\Models\UpvoteDownvote;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class PostOverview extends Widget
{
    protected int | string | array $columnSpan = 2;

    public ?Model $record = null;

    protected static string $view = 'filament.widgets.post-overview';

    protected function getViewData(): array
    {
        return [
            'countView' => PostView::where('post_id', '=', $this->record->id)->count(),
            'upVote'    => UpvoteDownvote::where('post_id', '=', $this->record->id)->where('is_upvote', '=', 1)->count(),
            'downVote'  => UpvoteDownvote::where('post_id', '=', $this->record->id)->where('is_upvote', '=', 0)->count(),
        ];
    }
}
