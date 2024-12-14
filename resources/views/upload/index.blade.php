@extends('layouts.template')
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFile" class="form-label">File CSV</label>
                    <input class="form-control" name="file_csv" type="file" id="formFile">
                </div>              
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
@endsection