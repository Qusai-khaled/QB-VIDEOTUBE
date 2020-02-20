{{@csrf_field()}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Page Name</label>
        <input type="text" name="name" value="" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Meta Keywords</label>
        <input type="text" name="meta_keywords" value=""  class="form-control  @error('meta_keywords') is-invalid @enderror">
            @error('meta_keywords')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    </div>
    <div class="col-md-12 ">
        <div class="form-group bmd-form-group">
        <label class=" text-center">Description</label>
        <textarea name="des" cols="30" rows="7" class="form-control @error('des') is-invalid @enderror">

        </textarea>
        @error('meta_des')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group bmd-form-group">
        <label class=" text-center">Meta Description</label>
        <textarea name="meta_des" cols="30" rows="7" class="form-control @error('meta_des') is-invalid @enderror">

        </textarea>
        @error('meta_des')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
