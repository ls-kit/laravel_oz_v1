@extends('shopify-app::layouts.default')


<!-- You are: (shop domain name) -->
@section('content')
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        
      </div>
      content here
    </main>

@endsection

@section('scripts')
    @parent

    <script>
      var titleBarOptions = {
        title: 'Products',
      }
        actions.TitleBar.create(app, titleBarOptions);
    </script>


@endsection