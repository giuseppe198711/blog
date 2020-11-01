@extends('layouts.base')



@section('page-content')
    <h1>Modifica il post: {{$post->title}}</h1>

    <form action="{{route("posts.update", $post)}}" method="POST">
        @csrf
        @method("PUT")
        <div>
        <input type="text" name="title" placeholder="Titolo" value="{{$post->title}}">
        </div>

        <div>
            <input type="text" name="slug" placeholder="Slug" value="{{$post->slug}}">
        </div>

        <div>
            <input type="text" name="author" placeholder="Autore" value="{{$post->author}}">
        </div>

        <div>
            <input type="text" name="image" placeholder="Immagine" value="{{$post->image}}">
        </div>

        <div>
            <textarea name="content" id="" cols="30" rows="10" placeholder="Contenuto">{{$post->content}}</textarea>
        </div>

        <div>
            <input type="submit" value="Salva">
        </div>
        
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection