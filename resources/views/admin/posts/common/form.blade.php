<div class="input-style-1">
    <label for="title">Title</label>
    <input type="text" name="title" placeholder="Title" id="title"
        value="{{ isset($post) ? $post->title : old('title') }}">
    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="input-style-1">
    <label for="summary">Summary</label>
    <textarea name="summary" placeholder="summary" rows="5" id="summary">{{ isset($post) ? $post->summary : old('summary') }}</textarea>
    @error('summary')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="input-style-1">
    <label for="content">Content</label>
    <textarea name="content" placeholder="Content" rows="5" id="content" class="ckeditor5">{{ isset($post) ? $post->content : old('content') }}</textarea>
    @error('content')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="input-style-1">
    <label for="image">Upload Image</label>
    <input type="file" name="image" id="image" accept="image/*">
    @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="d-flex gap-4">
    <div class="form-check radio-style mb-20">
        <input name="is_active" class="form-check-input" type="radio" value="1"
            id="active"{{ isset($post) ? ($post->is_active == 1 ? 'checked' : '') : 'checked' }}>
        <label class="form-check-label" for="active"> Active</label>
    </div>
    <div class="form-check radio-style mb-20">
        <input name="is_active" class="form-check-input" type="radio" value="0" id="inactive"
            {{ isset($post) ? ($post->is_active == 0 ? 'checked' : '') : '' }}>
        <label class="form-check-label" for="inactive">In Active</label>
    </div>
</div>
<button class="main-btn primary-btn btn-hover">
    Submit
</button>

@include('common.ckeditor5')