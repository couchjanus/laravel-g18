<div class="p-4 left-sidebar">
    <div class="widget">
        <form>
            <div class="input-append">
                <input class="span2" id="appendedInputButton" type="text" placeholder="Type here">
                <button class="btn btn-theme" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="widget">
        <h5 class="widgetheading">Categories</h5>
          <ul class="cat">
            @foreach ($categories as $category)
                <li><i class="icon-angle-right"></i> <a href="/blog/category/{{ $category->id }}">{{ $category->name }}</a></li>
            @endforeach
          </ul>
    </div>
</div>
