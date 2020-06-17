<div class="container">
  <div class="row">

    <div class="col-4">

        <aside class="left-sidebar">

            <div class="widget">
                <h5>Categories</h5>
                <ul>
                  <li><a href="#">Web design</a><span> (20)</span></li>
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

                    <img src="images/blog/img1.jpg" alt="" />
                </div>
                <div class="meta-post">
                    <ul>
                      <li>By <a href="#" class="author">{{ $post->user_id }}</a></li>
                      <li>On <a href="#" class="date">{{ $post->updated_at }}</a></li>
                      <li>Tags: <a href="#">Design</a>, <a href="#">Blog</a></li>
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
