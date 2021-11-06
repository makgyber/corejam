<div class=''>
    @foreach($post->categories as $category)
        <a class='btn  btn-secondary btn-sm m-1' href='{{$category->url()}}'>
            {{$category->category_name}}
        </a>
    @endforeach
</div>