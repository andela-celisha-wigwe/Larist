<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

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

            .each-inventory {
                font-size: 120%;
                text-align: left;
                padding: 15px;
                border-bottom: solid 1px rgba(51, 122, 183, 0.35);
                cursor: pointer;
            }

            .each-inventory:hover {
                background: rgb(218, 231, 242);
            }
        </style>
    </head>
    <body>
        <div class="container">

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
                    <div>
                        @foreach($inventories as $inventory)
                            <div class="each-inventory">
                                {{ $inventory->name }}
                            </div>
                        @endforeach
                    </div>



                    {{ $paging }}

                @endif
                
        </div>
    </body>
</html>
