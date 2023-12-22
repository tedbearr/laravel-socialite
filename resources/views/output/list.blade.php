@extends('layout.app')

@section('title')
    Output
@endsection

@section('menuTitle')
    Output
@endsection

@section('content')
<div class="table-responsive">
<table id="tableData" style="width:100% !important" class="table table-striped table-bordered table-sm">
    <thead>
        <tr>
            <th style="display:none">ID</th>
            <th>Ganjil</th>
            <th>Genap</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
</div>

<div class="modal fade" id="formModal" tabindex="-1" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel1"><span id="titleModal"></span></h3>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">No Handphone<span style="color:red">*</span></label></div>
                    <div class="col-12 col-md-9"><input type="text" id="formNoHp" placeholder="No Handphone..." class="form-control" required></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" onclick="closeModal()">
                    Close
                </button>
                <button type="button" id="saveButton" class="btn btn-danger">Save changes</button>
            </div>
        </div>
    </div>
</div>

@section('extjs')
<script src="app/output.js"></script>
@endsection

@endsection