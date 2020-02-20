<div class="section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h2 class="mb-2" >@lang('validation.Latest-Videos')</h2>
                <h5>@lang('validation.Keep-Learning')</h5>
            </div>
        </div>
        <br>
        <br>
        <div class="text-left">
            @include('front-end.shared.video_row')
        </div>
        <br>
        <a href="{{ route('home') }}" class="btn btn-danger btn-round">@lang('validation.More')</a>
    </div>
</div>
