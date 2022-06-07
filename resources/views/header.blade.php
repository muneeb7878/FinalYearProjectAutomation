
   <!-- {{session()->get('loggeduser')}} -->
<section id="Navbar-section">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/feed">Ideas</a>
                        </li>
                   
                    @if(session()->get('loggeduser')->role_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="/create">Create Committee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/detail">Committee Details</a>
                        </li>
                        @elseif(session()->get('loggeduser')->role_id == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="/upload">Upload Database</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="\pending">Pending Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="\rejected">Rejected Requests</a>
                        </li>
                        @elseif(session()->get('loggeduser')->role_id == 3)
                        <li class="nav-item">
                            <a class="nav-link" href="\pending">Pending Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="\rejected">Rejected Requests</a>
                        </li>
                        @elseif(session()->get('loggeduser')->role_id == 4)
                       
                        <li class="nav-item">
                            <a class="nav-link" href="\suprequest">Recieved Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="\groups">Your Group</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="\sendreqi">Send Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="\receivedstdreq">Received Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="\groups">Your Group</a>
                        </li>
                        @endif
                        
                        
                    </ul>
                    <ul class="navbar-nav ms-lg-3 ms-md-0 mt-lg-0 mt-md-3 mt-sm-3 mb-lg-0 mb-md-2">
                    <li class="nav-item">
                            <a class="nav-link" href="#">Logged User : {{session()->get('loggeduser')->name}}</a>
                        </li>
                        <li class="nav-item btn btn-outline-info">
                            <a class="nav-link text-white p-0" href="{{route('user.logout')}}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>