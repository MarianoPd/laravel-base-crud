<header >
    <div class="container ">
        <img src="{{asset('img/dc-logo.png')}}" alt="dc-logo">
        <ul>
            @foreach (config('menu') as $link )
                <li class="{{ (Route::currentRouteName() === $link['text']) ? 'active' : '' }}">
                    <a href="{{route($link['url'])}}">
                        {{$link['text']}}
                    </a>
                </li>
            @endforeach

        
        </ul>
    </div>
  </header>