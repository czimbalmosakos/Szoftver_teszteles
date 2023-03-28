<div id="app" class="d-flex">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <a href="{{ route('home') }}">
                        <li class="px-4" style="font-size: 25px;"> Főoldal </li>
                    </a>
                    <a href="{{ route('member.create') }}">
                        <li class="px-4" style="font-size: 25px;"> Űrlap </li>
                    </a>
                    <a href="{{ route('member.index') }}">
                        <li class="px-4" style="font-size: 25px;"> Tagok </li>
                    </a>
                </ul>
            </div>
        </div>
    </nav>
</div>
