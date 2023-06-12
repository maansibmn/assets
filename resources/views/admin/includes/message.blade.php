@if(Session::has('success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
@endif

@if(Session::has('danger'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('danger') !!}</em></div>
@endif
