{{@csrf_field()}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Video Name</label>
        <input type="text" name="name" value="{{ isset($videos) ? $videos->name : '' }}" class="form-control @error('name') is-invalid @enderror">
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
        <input type="text" name="meta_keywords" value="{{ isset($videos) ? $videos->meta_keywords : '' }}"  class="form-control  @error('meta_keywords') is-invalid @enderror">
            @error('meta_keywords')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">YouTube</label>
        <input type="url" name="youtube" value="{{ isset($videos) ? $videos->youtube : '' }}"  class="form-control  @error('youtube') is-invalid @enderror">
            @error('youtube')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Status</label>
            <select name="published" class="form-control @error('published') is-invalid @enderror">
                <option class="bg-dark " value="1" {{ isset($videos) && $videos->published == 1 ? 'selected'  :'' }}>published</option>
                <option class="bg-dark "  value="0" {{ isset($videos) && $videos->published == 0 ? 'selected'  :'' }}>hidden</option>
            </select>
            @error('published')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Category</label>
            <select name="cat_id" class="form-control @error('cat_id') is-invalid @enderror">
                @foreach($categories  as $caegory)
                    <option class="bg-dark " value="{{ $caegory->id }}" {{ isset($videos) && $videos->cat_id == $caegory->id ? 'selected'  :'' }}>{{ $caegory->name }}</option>
                @endforeach
            </select>
            @error('cat_id')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div >
            <label >Video image</label>
            <input type="file" name="image">
            @error('image')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="form-group bmd-form-group">
        <label class=" text-center">Description</label>
        <textarea name="des" cols="30" rows="5" class="form-control @error('des') is-invalid @enderror">
            {{ isset($videos) ? $videos->des : '' }}
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
        <textarea name="meta_des" cols="30" rows="3" class="form-control @error('meta_des') is-invalid @enderror">
            {{ isset($videos) ? $videos->meta_des : '' }}
        </textarea>
        @error('meta_des')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php $input = "skills[]"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="text-center"> <strong>Skills</strong>  (hold shift to select more than one)</label>
            <br>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror" multiple style="height: 100px">
                @foreach($skills  as $skill)
                    @if (request()->route()->parameter('video'))
                        <option value="{{ $skill->id }}"{{ in_array( $skill->id, $selectedSkills) ? 'selected' : '' }}   >{{ $skill->name }}</option>
                    @else
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endif
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input = "tags[]"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="text-center"> <strong>Tags</strong>  (hold shift to select more than one)</label>
            <br>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror" multiple style="height: 100px">
                @foreach($tags  as $tag)
                    @if (request()->route()->parameter('video'))
                    <option value="{{ $tag->id }}" {{ in_array( $tag->id, $selectedTags) ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @else
                    <option value="{{ $tag->id }}" >{{ $tag->name }}</option>
                    @endif
                @endforeach

            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
