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
                </div>
            </div>
            
            
        </div>
        <div class="container center">
            <button class="blue btn">
                <h3>load more</h3>
            </button>
        </div>
        
      </section>

@endsection