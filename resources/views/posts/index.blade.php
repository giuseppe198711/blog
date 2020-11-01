@extends('layouts.base')



@section('page-content')
<H1>Lista post</H1>

<ul>
    @foreach ($posts as $post)
    <li>
        <a href="{{route("posts.show", $post)}}">
            <img src="{{$post->image}}" alt="">
            <h3>{{$post->title}}</h3>
        </a>
        
    </li>       
    @endforeach
</ul>
@endsection


    