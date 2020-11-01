@extends('layouts.base')



@section('page-content')
    <h1>Aggiungi un nuovo post</h1>

    <form action="{{route("posts.store")}}" method="POST">
        @csrf
        @method("POST")
        <div>
            <input type="text" name="title" placeholder="Titolo">
        </div>

        <div>
            <input type="text" name="slug" placeholder="Slug">
        </div>

        <div>
            <input type="text" name="author" placeholder="Autore">
        </div>

        <div>
            <input type="text" name="image" placeholder="Immagine">
        </div>

        <div>
            <textarea name="content" id="" cols="30" rows="10" placeholder="Contenuto"></textarea>
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