{{@csrf_field()}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Category Name</label>
        <input type="text" name="name" value="{{ isset($categories) ? $categories->name : '' }}" class="form-control @error('name') is-invalid @enderror">
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
        <input type="text" name="meta_keywords" value="{{ isset($categories) ? $categories->meta_keywords : '' }}"  class="form-control  @error('meta_keywords') is-invalid @enderror">
            @error('meta_keywords')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    </div>
    <div class="col-md-12 m-auto">
        <div class="form-group bmd-form-group">
        <label class=" text-center">Meta Description</label>
        <textarea name="meta_des" cols="30" rows="10" class="form-control @error('meta_des') is-invalid @enderror">
            {{ isset($categories) ? $categories->meta_des : '' }}
        </textarea>
        @error('meta_des')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
