@extends('layout') @section('content')
<div>
    <form method="POST" action="/cp/addons/pdfupload/save" enctype="multipart/form-data" class="form-group">
        {{ csrf_field() }}

        <label> File Name</label>
        <input type="text" name="pdfname" class="form-control" required></input>

        <label> Alt Name </label>
        <input type="text" name="alt" class="form-control" required></input>

        <label></label>
        <input type="file" name="upload" class="form-control" />
        <label>Select A Year</label>
        <select-fieldtype name="year" data="year1" :options="[
            { value: 'year1', text: 'Year One' },
            { value: 'year2', text: 'Year Two' },
            { value: 'year3', text: 'Year Three'},
            { value: 'year4', text: 'Year Four'}
            ]">
        </select-fieldtype>
        <hr>
        <button type="upload" class="btn btn-default form-control">Upload Book</button>
    </form>
</div>
@endsection