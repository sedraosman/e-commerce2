<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <span class="navbar-brand">DashBoard</span>
    <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link">Welcome, {{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
                <a href="#" class="btn-danger nav-link text-white">LogOut</a>
            </li>
        </ul>
    </div>
</div>
</nav>