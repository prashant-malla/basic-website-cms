@if (Session::has('error'))
    <div class="toast fixed-bottom ml-3" data-autohide="false">
        <div class="toast-header">
            <strong class="mr-auto text-danger">Notification</strong>
            {{-- <small class="text-muted">5 mins ago</small> --}}
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
            {{ Session::get('error') }}
        </div>
    </div>
@endif

@if (Session::has('success'))
    <div class="toast fixed-bottom ml-3" data-autohide="false" style="position: absolute; top: 30; left: 30;">
        <div class="toast-header">
            <strong class="mr-auto text-success">Notification</strong>
            {{-- <small class="text-muted">5 mins ago</small>  --}}
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
            {{ Session::get('success') }}
        </div>
    </div>
@endif
