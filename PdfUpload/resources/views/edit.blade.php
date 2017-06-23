@extends('layout') @section('content')
<div>
    <form class="form-group" action="/cp/addons/pdfupload/update">
        {{ csrf_field() }}
        <input type="hidden" value="{{$file_detail['file_id']}}" class="form-control" name="id">
        <label>File Name</label>
        <input type="text" value="{{$file_detail['file_path']}}" disabled="disabled" class="form-control">
        <hr>
        <label>Alt Name</label>
        <input type="text" class="form-control" name="alt">
        <hr>
        <label>year</label>
        <select-fieldtype name="year" data="year1" :options="[
            { value: 'year1', text: 'Year One' },
            { value: 'year2', text: 'Year Two' },
            { value: 'year3', text: 'Year Three'},
            { value: 'year4', text: 'Year Four'}
            ]">
        </select-fieldtype>
        <hr>
        <label>Downloadable</label>
        <select-fieldtype name="download" data="download" :options="[
            { value: 'true', text: 'true' },
            { value: 'false', text: 'false' },
            ]">
        </select-fieldtype>
        <hr>
        <input type="submit" class="btn btn-primary" class="form-control" />
    </form>
</div>
@endsection