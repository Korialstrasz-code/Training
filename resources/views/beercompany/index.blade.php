<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: auto;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            table{
                width: 300px;
                border: 1px solid black;
                margin: auto;

            }
        </style>
    </head>
    <body>
    <p>Company List</p>
    <a href="{{route('beercompany.create')}}" class="links">Create</a>
    <table>
        @forelse($companyList as $company)
        <tr>
            <th>{{$company->id}}</th>
            <th>{{$company->name}}</th>
            <th> <a href="{{route('beercompany.edit',['beercompany'=>$company->id])}}" class="links">Edit</a></th>
            <th>
                <form method="post" action="{{route('beercompany.destroy',['beercompany'=>$company->id])}}">
                    {{ method_field('DELETE') }}
                    @csrf
                        <input type="submit" value="Delete">
                </form>
            </th>
        </tr>

        @empty
        @endforelse

    </table>

    </body>
</html>
