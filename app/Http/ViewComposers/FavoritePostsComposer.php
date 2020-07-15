<?php
namespace App\Http\ViewComposers;

use App\Post;
use Illuminate\Contracts\View\View;

class FavoritePostsComposer
{
  private $posts;

  public function __construct(Post $posts) {
    $this->posts = $posts;
  }

    public function compose(View $view) {
        return $view->with('favorites', $this->posts->orderBy('votes', 'desc')->take(4)->get());
    }

}
