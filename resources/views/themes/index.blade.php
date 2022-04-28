@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
            <a class="btn btn-success" href="{{ route('components.create') }}">Add Component</a>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Tumb</th>
                        <th>Theme Name</th>
                        <th>Descripiton</th>
                        <th style="width: 50px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($themeComponents as $component)
                    <tr>
                        <td>{{ $component->index }}</td>
                        <td><img src="{{ asset('/images/'.$component->image) }}" alt=""></td>
                        <td>
                            {{ $component->name }}
                        </td>
                        <td>
                            {{ $component->description }}
                        </td>
                        <td>
                            <a href="{{ route('components.edit', $component->id) }}" class="badge bg-primary">Edit</a>
                            <a href="{{ route('components.destroy', $component->id) }}" class="badge bg-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div>
    </div>
@endsection
