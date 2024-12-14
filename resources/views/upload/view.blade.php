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
        <div class="col-md-12">
            <table class="table-responsive table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tahun</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $key => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $key }}</td>
                            <td>{{ number_format($item, 0, '.', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak Ada Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection