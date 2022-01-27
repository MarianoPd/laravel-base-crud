<section class="archive">
    <div class="container">
        <div class="blue label">
            <h1>current series</h1>
        </div>
        <div class="sub-container">
            @foreach (config('comics') as $comic)
            <div class="card">
                <div class="image">
                    <img src="{{$comic['thumb']}}" alt="{{$comic['title']}}">
                </div>
                <p>{{$comic['title']}}</p>
            </div>
            @endforeach
        </div>
        
        
    </div>
    <div class="container center">
        <button class="blue btn">
            <h3>load more</h3>
        </button>
    </div>
    
  </section>