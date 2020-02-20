{{@csrf_field()}}
<div class="col-md-12 ">
        <div class="form-group bmd-form-group text-center">
        <label class=" text-center">Add Comments</label>
        <textarea name="comment" cols="30" rows="5" class="form-control @error('comment') is-invalid @enderror">
            {{ isset($videos) ? $videos->comment : '' }}
        </textarea>
        @error('comment')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
