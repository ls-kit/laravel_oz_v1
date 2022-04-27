@extends('shopify-app::layouts.default')


<!-- You are: (shop domain name) -->
<p>You are: {{ $shopDomain ?? Auth::user()->name }}</p>
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>

      </div>
      content here
        {{-- @php
            $components =
                [
                    [
                        'id' => '1',
                        'lable' => 'Shopify Slider',
                        'name' => 'shopify_slider',
                        'description' => 'Shopify App is a Laravel package that allows you to create a Shopify App in minutes.',
                    ],
                    [
                        'id' => '2',
                        'lable' => 'Shopify Navbar',
                        'name' => 'shopify_navbar',
                        'description' => 'Shopify App is a Laravel package that allows you to create a Shopify App in minutes.',
                    ],
                    [
                        'id' => '3',
                        'lable' => 'Shopify Footer',
                        'name' => 'shopify_footer',
                        'description' => 'Shopify App is a Laravel package that allows you to create a Shopify App in minutes.',
                    ],

                ]
        @endphp --}}

        @foreach ( $components as $theme )
            <button onclick="setupTheme('{{ $theme['id']}}', '{{  $theme['name'] }}')">{{ $theme['label'] }}</button>
        @endforeach

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
