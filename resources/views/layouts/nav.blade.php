<nav class="navbar navbar-expand-lg fixed-top bg-danger" >
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{ route('frontend.landing') }}" rel="tooltip" title="Coded by Creative Tim" data-placement="bottom" >
          QB-VideoTube
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('validation.Categories')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach ($categories as $category)
                            <a class="dropdown-item" href="{{ route('front.category', ['id'=>$category->id]) }}">{{$category->name}}</a>
                        @endforeach

                    </div>
                </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('validation.Skills')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach ($skills as $skill)
                                <a class="dropdown-item" href="{{ route('front.skill', ['id'=>$skill->id]) }}">{{$skill->name}}</a>
                            @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('validation.language')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('Localization', ['locale'=>'en']) }}"><img src="{{ asset('frontend/img/uk.png') }}" alt="English"> English</a>
                            <a class="dropdown-item"href="{{ route('Localization', ['locale'=>'fr']) }}"><img src="{{ asset('frontend/img/France.png') }}" alt="French"> French</a>
                            <a class="dropdown-item"href="{{ route('Localization', ['locale'=>'ar']) }}"><img src="{{ asset('frontend/img/jordan.png') }}" alt="French"> العربية</a>
                    </div>
                </li>
            @guest
                    <li class="nav-item">
                        <a href="{{ url('/login') }}" class="nav-link">@lang('validation.login')</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/register') }}" class="nav-link">@lang('validation.register')</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        <a class="dropdown-item" href="{{ route('front.profile' , ['id' => auth()->user()->id]) }}" >@lang('validation.prof')</a>
                        @if (auth()->user()->group == 'admin')
                            <a class="dropdown-item" href="{{ route('admin') }}" >@lang('validation.admin')</a>
                        @endif

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                @lang('validation.Logout')
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest


                    @yield('search')


        </ul>
      </div>
    </div>
  </nav>
