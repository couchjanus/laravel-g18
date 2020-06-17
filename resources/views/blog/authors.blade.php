<div class="container">
  <div class="row">

    <div class="col-4">

        <aside class="left-sidebar">

            <div class="widget">
                <h5>Categories</h5>
                <ul>
                <?php foreach ($categories as $category):?>
                  <li><a href="/blog/category/{{ $category->id }}">{{ $category->name }}</a></li>
                <?php endforeach?>
                </ul>
            </div>

            <div class="widget">
                <h5>Recent</h5>
                <ul>
                  <li><a href="#">Web design</a></li>
                </ul>
            </div>
            <div class="widget">
                <h5>Popular</h5>
                <ul>
                  <li><a href="#">Web design</a></li>
                </ul>
            </div>
            
        </aside>
    </div>

    <div class="col-8">
      <?php foreach ($posts as $post):?>
        <article>
          <div class="row">
            
            <div class="span">
                <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{ $post->title }}</a></h3>
                    </div>

                    <img src="/images/blog/img1.jpg" alt="" />
                </div>
                <div class="meta-post">
                    <ul>
                      <li>By <a href="/blog/author/{{ $post->user_id }}" class="author">{{ $post->username }}</a></li>
                      <li>On <a href="#" class="date">{{  \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</a></li>
                      <li>Category: <a href="/blog/category/{{ $category->id }}">{{ $post->name }}</a></li>
                    </ul>
                </div>
                <div class="post-entry">
                    <p>
                      {{ $post->content }}
                    </p>
                    <a href="#" class="readmore">Read more <i class="icon-angle-right"></i></a>
                </div>
            </div>
          
          </div>
        </article>
      <?php endforeach?>        
    </div>
  </div>
</div>
