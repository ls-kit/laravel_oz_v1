@extends('shopify-app::layouts.default')

@section('content')

    <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
        <div class="container mt-3">
            <h2>Choose Layouts</h2>
            <div class="row">

              @foreach ( $components as $theme )
              <div class="col-md-3 my-2">
                <div class="card img-fluid">
                  <img src="../bootstrap4/img_avatar1.png">
                  <div class="card-img-overlay">
                    <h4 class="card-title">{{ $theme['label'] }}</h4>
                    <p class="card-text">{{$theme['description']  }}</p>
                    <button class="btn btn-primary" onclick="setupTheme('{{ $theme['id']}}', '{{  $theme['name'] }}')">Install</button>
                  </div>
                </div>
              </div>
              @endforeach

            </div>  <!-- .row end -->

          </div>

    </main>

@endsection

@section('scripts')
    @parent

    <script>
      var AppBridge = window['app-bridge'];
      var actions = AppBridge.actions;
      var titleBarOptions = {
        title: 'Dashboard',
      }
        actions.TitleBar.create(app, titleBarOptions);

        function setupTheme(id, name){
          axios.post('configure-theme', {id: id, name: name})
                .then(function(response) {
                  console.log(response);
              })
                .catch(function(error) {
                  console.log(error);
              });
        }
        </script>


@endsection
