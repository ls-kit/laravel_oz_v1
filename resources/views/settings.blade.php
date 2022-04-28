@extends('shopify-app::layouts.default')


<!-- You are: (shop domain name) -->
@section('content')

    <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Settings</h1>
        @if ( $script_setting->activated != 1 )
        <button onclick="installScript()">Add Script</button>
        @endif
        @if ( $script_setting->activated == 1 )
        <button >Already added</button>
        @endif
      </div>
      content here
    </main>

@endsection

@section('scripts')
    @parent

    <script>
      var AppBridge = window['app-bridge'];
      var actions = AppBridge.actions;
      var titleBarOptions = {
        title: 'Settings',
      }
        actions.TitleBar.create(app, titleBarOptions);


        function installScript(){
          axios.post('install-script')
                .then(function(response) {
                  console.log(response);
              })
                .catch(function(error) {
                  console.log(error);
              });
        }
    </script>


@endsection
