<?php
namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\Contracts\View\View;

class FavoriteCategoriesComposer
{
  private $categories;

  public function __construct(Category $categories) {
    $this->categories = $categories;
  }

    public function compose(View $view) {
        return $view->with('favcategories', $this->categories->withCount('posts')->orderBy('posts_count', 'desc')->take(3)->get());
    }
}
