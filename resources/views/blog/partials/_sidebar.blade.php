<div class="p-4 left-sidebar">

    <div class="card my-4 widget">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
          <form action="{{ route('search.result') }}" method="get" class="form-inline mr-auto">@csrf
            <div class="input-group">
                <input type="text" name="query" class="form-control"  value="{{ isset($searchterm) ? $searchterm : ''  }}" placeholder="Search for..." aria-label="Search">
                <span class="input-group-btn">
                    <button class="btn aqua-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Go!</button>
                </span>
            </div>
          </form>
        </div>
    </div>

    <div class="card my-4 widget">
        <h5 class="widgetheading card-header">Categories</h5>
        <div class="card-body">
          <ul class="cat">
            @foreach ($categories as $category)
                <li><i class="fa fa-angle-right"></i> <a href="{{ route('blog.by.category', $category->id) }}">{{ $category->name }}</a></li>
            @endforeach
          </ul>
        </div>
    </div>

    <div class="card my-4 widget">
        <h5 class="widgetheading card-header">Recents posts</h5>
        <div class="card-body">
          <ul class="cat">
            @foreach ($recents as $item)
                <li>@fa('fa-angle-right') <a href="{{ route('blog.show', $item->slug) }}">{{ $item->title }}</a></li>
            @endforeach
          </ul>
          </div>
    </div>
    <div class="card my-4 widget">
        <h5 class="widgetheading card-header">Tags cloud</h5>
        <div class="card-body">
          <x-tag-cloud>
          </x-tag-cloud>
          </div>
    </div>
    
</div>
