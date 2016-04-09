
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome di halaman Non-Admin</div>

                <div class="panel-body">
                    <p>Halo, {{$_SESSION['username']}}!</p>
                   <button type="button" onclick="window.location='{{url("/dologout")}}'">Log Out</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

