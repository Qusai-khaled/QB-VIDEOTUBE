<div class="section landing-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h2 class="text-center">@lang('validation.touch')</h2>
                <form class="contact-form" action="{{ route('contact_us') }}" >
                    <div class="row">
                        <div class="col-md-6">
                            <label>@lang('validation.attributes.name')</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i class="nc-icon nc-single-02"></i>
                                </span>
                            </div>
                            <input name="name" required type="text" class="form-control @error('name') is-invalid @enderror" placeholder="@lang('validation.attributes.name')">
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>@lang('validation.attributes.email')</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i class="nc-icon nc-email-85"></i>
                                </span>
                            </div>
                            <input name="email" required type="text" class="form-control @error('email') is-invalid @enderror" placeholder="@lang('validation.attributes.email')">
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <label>@lang('validation.attributes.content')</label>
                    <textarea name="message" required class="form-control @error('message') is-invalid @enderror" rows="4" placeholder="@lang('validation.attributes.content')"></textarea>
                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="row">
                    <div class="col-md-4 ml-auto mr-auto">
                        <button class="btn btn-danger btn-lg btn-fill">@lang('validation.send')</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
