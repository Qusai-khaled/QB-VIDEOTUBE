<div class="row text-center">
    @foreach ($videos as $video)
        <div class="col-lg-4 mb-5">
    @include('front-end.shared.video_card')
        </div>
    @endforeach
</div>
<div class="row text-center">
    <div class="col-md-12 ">
    {{$videos->links()}}
    </div>
</div>
