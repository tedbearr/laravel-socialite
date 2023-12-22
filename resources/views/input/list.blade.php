@extends('layout.app')

@section('title')
    Input
@endsection

@section('menuTitle')
    Input
@endsection

@section('content')
                                
<form  method="post" enctype="multipart/form-data" >
    <div class="col-lg-7">
        <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">No Handphone</label></div>
            <div class="col-12 col-md-9"><input type="text" id="noHp" placeholder="No HP..." class="form-control" required></div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Provider</label></div>
            <div class="col-12 col-md-9">
                <select name="level" id="selectProvider" class="form-control"></select>
            </div>
        </div>
    </div>
<hr>
    <div class="col-lg-7">
        <button type="button" id="saveManual" class="btn btn-primary">Submit</button>
        <button type="button" id="saveAuto" class="btn btn-success">Auto</button>
    </div>                                
</form>

                            
@section('extjs')
<script src="app/input.js"></script>
@endsection

@endsection