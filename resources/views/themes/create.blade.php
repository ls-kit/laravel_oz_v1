@extends('layouts.master')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Theme Components</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('components.store') }}" method="post" enctype="multipart/form-data">\
        @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Component Name</label>
              <input type="email" class="form-control" id="name" name="name" placeholder="name">
            </div>
            <div class="form-group">
              <label for="label">Label</label>
              <input type="text" class="form-control" name="label" id="label" placeholder="label">
            </div>


            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="description">
            </div>

            <div class="form-group">
              <label for="exampleInputFile">Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image" placeholder="image">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="source" placeholder="source file">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
@endsection
