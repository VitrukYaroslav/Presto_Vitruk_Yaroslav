<nav class="navbar navbar-expand-lg" id="nav">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}"><img src="/media/logo.png" height="55" alt="LOGO"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav menu ms-auto mb-2 mb-lg-0">
                <li>
                    <a class="nav-link active hovercustom" aria-current="page" href="{{ route('article.index') }}"><i
                            class="bi bi-book-half"></i> {{ __('ui.catalog') }}</a>
                </li>
                <li class="nav-item dropdown hovercustom">
                    <a class="nav-link dropdown-toggle active " href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="bi bi-list-columns-reverse"></i> {{ __('ui.categories') }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li class="dropdown-item py-0">
                                <a class="nav-link active py-0 " aria-current="page"
                                    href="{{ route('categoryShow', compact('category')) }}">{{ __("ui.$category->name") }}</a>
                            </li>
                            <li class="dropdown-item">
                            </li>
                        @endforeach
                    </ul>
                </li>
                @auth
                    <li class="nav-item hovercustom">
                        <a class="nav-link active" aria-current="page" href="{{ route('article.create') }}"><i
                                class="bi bi-journal-plus"></i>{{ __('ui.insertArticle') }}</a>
                    </li>

                @endauth

                @guest
                    <li>
                        <a class="nav-link active hovercustom" href="{{ route('register') }}"><i
                                class="bi bi-person-plus"></i>{{ __('ui.signIn') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active hovercustom" href="{{ route('login') }}"><i class="bi bi-door-open"></i> Login</a>
                    </li>

                @endguest

                @auth
                    <li class="navbar-nav dropdown hovercustom">
                        <a class="nav-link active dropdown-toggle active" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i>
                            {{ __('ui.hello') }} {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('profile') }}"><i
                                        class="bi bi-person-vcard"></i> {{ __('ui.profile') }}</a>
                            </li>
                            @if (Auth::user()->is_revisor)
                                <li class="dropdown-item">
                                    <a class="nav-link active dropdown active" href="{{ route('revisor.index') }}"><i
                                            class="bi bi-person-square"></i> {{ __('ui.revisorArea') }}
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ App\Models\Article::toBeRevisionedCount() }}
                                            <span class="visually-hidden">unread messages</span>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            <li class="dropdown-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="nav-link active" type="submit"><i class="bi bi-door-open-fill"></i>
                                        Logout</button>
                                @endauth
                            </form>
                        </li>
                    </ul>
                </li>


                <li class="navbar-nav hovercustom">
                    <x-_locale lang="it" />
                </li>

                <li class="navbar-nav hovercustom">
                    <x-_locale lang="en" />
                </li>

                <li class="navbar-nav hovercustom">
                    <x-_locale lang="de" />
                </li>
            </ul>
            <ul class="navbar-nav  mb-2 mb-lg-0">

                <form class="d-flex Searchbar" role="search" action="{{ route('articles.search') }}" method="GET">

                    <input name="searched" class="form-control me-2 Searchbar" type="search"
                        placeholder="{{ __('ui.search') }}" aria-label="Search">

                    <button class="btn btnSearch" type="search"><i class="bi bi-search iconsearch"></i></button>

                </form>
            </ul>
        </div>
    </div>
</nav>
