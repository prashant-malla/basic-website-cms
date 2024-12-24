@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.ckeditor5'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush