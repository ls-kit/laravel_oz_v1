@extends('shopify-app::layouts.default')


<!-- You are: (shop domain name) -->
<p>You are: {{ $shopDomain ?? Auth::user()->name }}</p>
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>

      </div>
      content here
      @if (auth()->user()->name != $setting->shop_id)
        <button onclick="setupTheme()">Make File</button>
      @endif
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

        function setupTheme(){
          axios.post('configure-theme')
                .then(function(response) {
                  console.log(response);
              })
                .catch(function(error) {
                  console.log(error);
              });
        }
        </script>


@endsection
