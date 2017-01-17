<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<link href='https://fonts.googleapis.com/css?family=Oswald:400' rel='stylesheet' type='text/css'>


<div>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">
          <div class="thosm">MilkBag Sports</div></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>
            <li class="dropdown {{ Route::is('posts.*') ? "active" : "" }}">
              <a role="button" aria-haspopup="true" aria-expanded="false">Posts<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/posts">All</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Tags</li>
                <li><a href="/posts/tags/Baseball">Baseball</a></li>
                <li><a href="/posts/tags/Basketball">Basketball</a></li>
                <li><a href="/posts/tags/Hockey">Hockey</a></li>
                <li><a href="/posts/tags/Football">Football</a></li>
                <li><a href="/posts/tags/Viral">Viral</a></li>
                <li><a href="/posts/tags/Other">Other</a></li>
              </ul>
            </li>
            <li class="{{ Request::is('AboutUs') ? "active" : "" }}"><a href="/AboutUs">About Us</a></li>

          </ul>


      <form id="searchbar" class="navbar-form navbar-left">
        <search></search>
      </form>

    <ul class="nav navbar-nav navbar-right">
      <nav class="social__nav">
      	<ul>
      		<a href="https://www.facebook.com/milkbagsports/" target="_blank" style=" padding-top: 9px; padding-right: 9px;" class="fa fa-facebook-square fa-2x"></a>
      		<a href="https://twitter.com/milkbag_sports/" target="_blank" style="padding-right: 9px;" class="fa fa-twitter fa-2x"></a>
      		<a href="https://www.instagram.com/milkbagsports/" target="_blank" style="padding-right: 9px;" class="fa fa-instagram fa-2x"></a>
      	</ul>
      </nav>
    </ul>

    @if (Auth::check())
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a role="button" aria-haspopup="true" aria-expanded="false">Author<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/authordashboard">Dashboard</a></li>
            @if (Auth::User()->hasRole('Admin'))
                <li><a href="/admindashboard">Admin Dashboard</a></li>
            @endif
            <li><a href='/authorchangepassword'>Change Password</a>
            <li><a href="/authorlogout">Log out</a></li>
            </ul>
          </li>

        </ul>
      @endif

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<script src="https://unpkg.com/lodash@4.13.1/lodash.min.js"></script>
<script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
<script src="/js/app.js"></script>
