@extends('layouts.base')



@section('page-content')
    <h1>{{$post->title}}</h1>
    <img src="{{$post->image}}" alt="{{$post->title}}">
    <div><strong>Autore:</strong>{{$post->author}}</div>

    <p>
        {{$post->content}}
    </p>
    Azioni:
    <ul>
        <li><a href="{{route("posts.edit", $post)}}">Edit</a></li>
        <li>
            <form action="{{route("posts.destroy", $post)}}" method="POST">
                @csrf
                @method("DELETE")

                <input type="submit" value="Delete">

            </form>
        </li>
        
    </ul>
@endsection