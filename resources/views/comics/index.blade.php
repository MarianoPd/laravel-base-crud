@extends('layouts.app')
@section('content')



    @if(session('deleted'))
        <div class="message">
            <h3>{{session('deleted')}}</h3>
        </div>
    @endif

    <section class="jumbo">
        <img src="{{asset('img/jumbotron.jpg')}}" alt="jumbotron">
    </section>
    
    <section class="archive">
        <div class="container">
            
            <div class="blue label">
                <h1>current series</h1>
            </div>
            <div class="sub-container">
                @foreach ($comics as $comic)
                <div class="card">
                    <div class="image">
                        <img src="{{$comic['thumb']}}" alt="{{$comic['title']}}">
                    </div>
                    <p>
                        <a href="{{route('comics.show',$comic)}}">{{$comic['title']}}</a>
                    </p>
                </div>
                @endforeach
            </div>
            
            
        </div>
        <div class="container center">
            {{-- <button class="blue btn">
                <h3>load more</h3>
            </button> --}}
            <div class="blue btn">
            {{$comics->links()}}
            </div>
        </div>
        
      </section>

@endsection