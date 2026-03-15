    <!--==========================================================================-
           Nav Section
    --==========================================================================-->
    <nav class="nav">
        <div class="toggler">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="nav__list toggle-transform">
            <li class="nav__item">
                <a href="https://wa.me/{{$whatsapp->phone}}" target="_blank" class="btn btn-bg">{{ $logo->button }}</a>
            </li>
            @foreach ($navlist as $navitem)
            <li class="nav__item">
                <a href="{{ route('home') }}{{$navitem->url}}" class="nav__link"> {{ $navitem->name }} </a>
            </li>
            @endforeach
        </ul>
        <div class="nav__heading">
            <p class="nav__text secondary__text">{{ $logo->name }}</p>
            <img src="{{url('imgs/zmzm-half-logo.png')}}" alt="zmzm-decoration" style="max-width: 8rem;" class="nav__icon" />
        </div>
    </nav>