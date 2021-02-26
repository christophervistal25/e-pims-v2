@if ($errors->any())
<div class="alert alert-danger alert-block">
<button type="button" class="close" data-dismiss="alert">×</button>
    <ul>
        @foreach ($errors->all() as $error)
            <p class="text-center">{{ $error }}</p>
        @endforeach
    </ul>
</div>
@endif