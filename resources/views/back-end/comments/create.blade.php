<form action="{{ route('comments.store') }}" method="POST">
    {{@csrf_field()}}
    @include('back-end.comments.form')
    <input type="hidden" value="{{$videos->id}}"   name="video_id">
        <button type="submit" class="btn btn-primary pull-right">Add Comment</button>
        <div class="clearfix"></div>
</form>
