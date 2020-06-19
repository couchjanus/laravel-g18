<div class="p-4">
    <div class="widget">
        <form>
            <div class="input-append">
                <input class="span2" id="appendedInputButton" type="text" placeholder="Type here">
                <button class="btn btn-theme" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="widget">
        <h5>Categories</h5>
          <ul>
            @foreach ($categories as $category)
                <li><a href="/blog/category/{{ $category->id }}">{{ $category->name }}</a></li>
            @endforeach
          </ul>
    </div>
</div>
