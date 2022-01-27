<header >
    <div class="container ">
        <img src="{{asset('img/dc-logo.png')}}" alt="dc-logo">
        <ul>
            <li class="{{ (Route::currentRouteName() === 'home') ? 'active' : '' }}">
                <a href="{{route('home')}}">
                    {{'home'}}
                </a>
            </li>
            <li class="{{ (Route::currentRouteName() === 'comics.index') ? 'active' : '' }}">
                <a href="{{route('comics.index')}}">
                    {{'comics'}}
                </a>
            </li>
            <li>
                <a href="/">movies</a>
            </li>
            <li>
                <a href="/">tv</a>
            </li>
            <li>
                <a href="/">games</a>
            </li>
            <li>
                <a href="/">collectables</a>
            </li>
            <li>
                <a href="/">videos</a>
            </li>

        
        </ul>
    </div>
  </header>