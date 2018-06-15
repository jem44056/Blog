<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://localhost/blog/public">Forum</a>
      </div>
      <div class="navbar-collapse collapse" id="navbar">
        <ul class="nav navbar-nav navbar-right">

          @if(! $currentUser )
          <li>{!! link_to_route('get_login', 'Log in') !!}</li>
          <li>{!! link_to_route('get_register', 'Register') !!}</li>

          @else

          <li><a>Welcome, {{$currentUser->name}}</a></li>
          <li>{!! link_to_route('get_post', 'Question?') !!}</li>
          <li>{!! link_to_route('get_logout', 'Logout') !!}</li>

          @endif


        </ul>
        </div>
      </div>
      </nav>