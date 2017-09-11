@if(session('message'))
    <div class="alert alert-danger">
        <p>{{ session('message')  }}</p>
    </div>
@endif