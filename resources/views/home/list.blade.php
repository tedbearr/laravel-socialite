@extends('layout.app')

@section('title')
    Home
@endsection

@section('menuTitle')
    Home
@endsection

@section('content')
<a href="#" id="addData" onclick="addData()" class="btn btn-primary"> Add <i class="fa fa-plus"></i></a>
<hr>
<div class="table-responsive">
<table id="tableData" style="width:100% !important" class="table table-striped table-bordered table-sm">
    <thead>
        <tr>
            <th style="display:none">ID</th>
            <th>Code</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
</div>

<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Detail</h5>
            </div>
            <div class="modal-body">
                <div class="listView">
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Title <span>:</span></label></div>
                        <div class="col-12 col-md-9"><span id="viewTitle"></span></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Description <span>:</span></label></div>
                        <div class="col-12 col-md-9"><span id="viewDescription"></span></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel1"><span id="titleModal"></span></h3>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Title<span style="color:red">*</span></label></div>
                    <div class="col-12 col-md-9"><input type="text" id="formTitle" placeholder="Title..." class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Description</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="formDescription" placeholder="Description..." class="form-control" required></div>
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
<script src="app/home.js"></script>
@endsection

@endsection