@if (session('success'))
<div class="row mb-2">
    <div class="col-lg-12">
        <div class="alert alert-success alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session('success') }}</strong>
        </div>
    </div>
</div>
@endif

@if (session('error'))
<div class="row mb-2">
    <div class="col-lg-12">

        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session('error') }}</strong>
        </div>
    </div>
</div>
@endif

@if (session('warning'))
<div class="row mb-2">
    <div class="col-lg-12">

        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session('warning') }}</strong>
        </div>
    </div>
</div>
@endif

@if (session('info'))
<div class="row mb-2">
    <div class="col-lg-12">

        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session('info') }}</strong>
        </div>

    </div>
</div>
@endif

@if ($errors->any())
<div class="row mb-2">
    <div class="col-lg-12">

        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Please check the form below for errors
        </div>
    </div>
</div>
@endif
