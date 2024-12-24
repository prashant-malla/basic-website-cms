<div class="input-style-1">
    <label for="title">Title</label>
    <input type="text" name="title" placeholder="Title" id="title"
        value="{{ isset($photo) ? $photo->title : old('title') }}">
    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="input-style-1">
    <label for="description">Description</label>
    <textarea name="description" placeholder="Description" rows="2" id="description">{{ isset($photo) ? $photo->description : old('description') }}</textarea>
    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="input-style-1">
    <label for="main_image">Upload Main Image</label>
    <input type="file" name="main_image" id="main_image" accept="image/*">
    @error('main_image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    @if (isset($photo))
        <img src="{{ asset('uploads/photo_galleries/' . $photo->main_image) }}" alt="" height="200px">
    @endif
</div>

<div class="input-style-1">
    <label for="main_image">Upload Other Image <small>(select multiple)</small></label>
    <input type="file" name="other_images[]" id="other_images" accept="image/*" multiple>
    @error('other_images')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    @if (isset($photo))
        @foreach ($photo->images as $image)
            <img src="{{ asset('uploads/photo_galleries/' . $image->image_name) }}" alt="" height="200px">
        @endforeach
    @endif
</div>

<div class="d-flex gap-4">
    <div class="form-check radio-style mb-20">
        <input name="is_active" class="form-check-input" type="radio" value="1"
            id="active"{{ isset($photo) ? ($photo->is_active == 1 ? 'checked' : '') : 'checked' }}>
        <label class="form-check-label" for="active"> Active</label>
    </div>
    <div class="form-check radio-style mb-20">
        <input name="is_active" class="form-check-input" type="radio" value="0" id="inactive"
            {{ isset($photo) ? ($photo->is_active == 0 ? 'checked' : '') : '' }}>
        <label class="form-check-label" for="inactive">In Active</label>
    </div>
</div>
<button class="main-btn primary-btn btn-hover">
    Submit
</button>
