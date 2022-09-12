<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand"><h1>旅のしおり</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('home') ? 'active' : ''}}" href="/">Home</a>
          </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('trips/index') ? 'active' : ''}}" href="/trips/">Trips</a>
          </li>
      </ul>

          <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"> My Page </i></a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"> Logout </i></button>
              </form>
          </ul>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link"  href="/login" ><i class="bi bi-box-arrow-in-right">Log In</i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="/register"><i class="bi bi-person-badge">Register</i></a>
        </li>
        @endauth
      </ul>


    </div>
  </div>
</nav>