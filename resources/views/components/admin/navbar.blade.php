<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="{{route('admin')}}">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Content
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('admin.directories.index')}}">Directories</a>
                    <a class="dropdown-item" href="{{route('admin.pages.index')}}">Pages</a>
                </div>

            </li>
            <li>
                <a class="nav-link" href="{{route('admin.users.index')}}">Users</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Main Page</a>
            </li>
        </ul>
    </div>
</nav>