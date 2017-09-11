@if(session('error'))
    <div class="alert alert-danger">
        <p>{{ session('error')  }}</p>
    </div>
@endif