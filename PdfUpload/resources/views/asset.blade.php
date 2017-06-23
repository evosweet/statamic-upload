@extends('layout') @section('content')

<table class="table table-condensed">
<tr>
    <th>File Name</th>
    <th>Modification Date</th>
    <th>Edit</th> 
</tr>
@foreach($assets as $asset)
<tr>
    <td> {{ $asset->basename() }} </td>
    <td> {{ $asset->lastModified() }} </td>
    <td> <a href="/cp/addons/pdfupload/edit?id={{$asset->id()}}">Edit</a></td>

</tr>
</tr>
 
@endforeach
</table>

@endsection