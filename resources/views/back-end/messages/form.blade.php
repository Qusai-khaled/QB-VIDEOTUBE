{{@csrf_field()}}
<div class="row mb-4">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Name</label>
        <input type="text" name="name" value="{{ isset($messages) ? $messages->name : '' }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Email</label>
        <input type="text" name="email" value="{{ isset($messages) ? $messages->email : '' }}"  class="form-control  @error('email') is-invalid @enderror">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    </div>
    <div class="col-md-12 ">
        <div class="form-group bmd-form-group">
        <label class=" text-center">Message</label>
        <textarea name="message" cols="30" rows="7" class="form-control @error('message') is-invalid @enderror">
            {{ isset($messages) ? $messages->message : '' }}
        </textarea>
        @error('meta_message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12 ">
    <div class="card-header card-header-primary text-center text-white mb-5">
        <h4 >Replay Message</h4>
    </div>
    <form action="{{ route('message-replay',['id'=>$messages->id]) }}" method="POST">
        {{@csrf_field()}}
        <div class="form-group bmd-form-group">
        <label class=" text-center">Message</label>
        <textarea name="message" cols="30" rows="7" class="form-control @error('message') is-invalid @enderror">

        </textarea>
        @error('meta_message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary pull-right">Replay</button>
    </form>
    </div>


</div>

<hr class="text-secondary">
