<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">

                @if ($errors->count() > 0)
                     <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="GET" action="{{ route('all.inventories') }}"  class="">
                    <div class="panel panel-heading">Search</div>

                    <input type="hidden" value="{{ csrf_token() }}">

                    <input type="text" placeholder="Enter a name" name="name" id="by-name">

                    <button class="btn btn-primary" id="search-button"> <i class="fa fa-search"> </i> Search</button>

                    <select name="by-category" id="by-category"></select>
                </form>

                @if( isset($inventories) && $inventories->count() > 0)
                    <div class="row">
                        @foreach($inventories as $inventory)
                            <div class="col-md-12">
                                {{ $inventory->name }}
                            </div>
                        @endforeach
                    </div>
                @endif
                
            </div>
        </div>
    </body>
</html>
