@if(Session::has('comment_message'))
<div class="alert alert-success" style="margin-top:60px;">

    <p>{{session('comment_message')}}</p>

</div>
@endif