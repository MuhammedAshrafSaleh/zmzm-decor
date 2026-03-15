@if (session()->has('success'))
<div class="col-12 text-center">
    <p class="alert alert-warning text-bold">{{ session()->get('success') }}</p>
</div>
@elseif (session()->has('error'))
<div class="col-12 text-center">
    <p class="alert alert-danger text-bold">{{ session()->get('error') }}</p>
</div>
@endif