@extends('layouts.app')
@section('content')
    <section class="jumbo">
        <img src="{{asset('img/jumbotron.jpg')}}" alt="jumbotron">
    </section>
    
    <section class="archive">
        <div class="container">
            <div class="blue label">
                <h1>{{$comic->title}}</h1>
            </div>
            <div class="sub-container show">
                <img src="{{$comic->thumb}}" alt="{{$comic->title}}">
                <div class="text">
                    <p>{{$comic->description}}</p>
                    <br>
                    <p>Series: {{$comic->series}}</p>
                    <br>
                    <p>Release: {{$comic->sale_date}}</p>
                    <br>
                    <p>Type: {{$comic->type}}</p>
                    <br>
                    <h3>Price: {{$comic->price}}$</h3>
                </div>
            </div>
            
            
        </div>                
        <div class="container center">
            
                <a href="{{route('comics.index')}}" class="blue btn"><h3>go back</h3></a>
                <a href="{{route('comics.edit', $comic)}}" class="blue btn"><h3>edit</h3></a>
                
                <form onsubmit="return confirm('sei sicuro di eliminare: {{$comic->title}}')"
                    action="{{ route('comics.destroy', $comic) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="blue btn">
                        <h3>delete</h3>
                    </button>
                </form>
                    
                
            
        </div>
        
      </section>

@endsection