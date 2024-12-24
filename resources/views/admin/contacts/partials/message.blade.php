<div class="warning-modal">
    <div class="modal fade" id="modal-message" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content card-style">
                <div class="modal-header px-0 border-0">
                    <h5 class="text-bold">Read message!</h5>
                </div>
                <div class="modal-body px-0">
                    <div class="content mb-30">
                        <p class="text-md mb-3" id="subject"></p>
                        <p class="text-sm" id="message"></p>
                    </div>
                    <div class="action d-flex flex-wrap align-items-center justify-content-end">
                        <button data-bs-dismiss="modal" class="main-btn btn-sm primary-btn btn-hover m-1">
                            Okay
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('.show-message').click(function(e) {
                e.preventDefault();
                $('#modal-message').modal('show')
                let btn = $(this)

                let subject = btn.data('subject')
                let message = btn.data('message')

                $('#subject').text(subject);
                $('#message').text(message);
            })
        })
    </script>
@endpush
