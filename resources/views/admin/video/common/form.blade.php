<div class="input-style-1">
    <label for="title">Title</label>
    <input type="text" name="title" placeholder="Title" id="title"
        value="{{ isset($video) ? $video->title : old('title') }}">
    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="input-style-1">
    <label for="description">Description</label>
    <textarea name="description" placeholder="Description" rows="5" id="description">{{ isset($video) ? $video->description : old('description') }}</textarea>
    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="input-style-1">
    <label for="url">Url</label>
    <input type="text" name="url" placeholder="url" id="url"
        value="{{ isset($video) ? $video->url : old('url') }}">
    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="d-flex gap-4">
    <div class="form-check radio-style mb-20">
        <input name="is_active" class="form-check-input" type="radio" value="1"
            id="active"{{ isset($video) ? ($video->is_active == 1 ? 'checked' : '') : 'checked' }}>
        <label class="form-check-label" for="active"> Active</label>
    </div>
    <div class="form-check radio-style mb-20">
        <input name="is_active" class="form-check-input" type="radio" value="0" id="inactive"
            {{ isset($video) ? ($video->is_active == 0 ? 'checked' : '') : '' }}>
        <label class="form-check-label" for="inactive">In Active</label>
    </div>
</div>
<button class="main-btn primary-btn btn-hover">
    Submit
</button>
