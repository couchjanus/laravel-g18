<div class="tagcloud">
	<ul>
    @foreach ($tags as $tag)
        <li><a href="#"><span>{{ $tag->name }}</span></a></li>
    @endforeach
	</ul>
</div>
