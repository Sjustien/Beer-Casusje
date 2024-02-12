@extends('layouts.head')
<style> 
    body {
        font-family: verdana;
    }
    .beer-container {
        display: flex;
        flex-wrap: wrap;
    }

    .beer-tile {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin: 10px;
        width: 300px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .beer-tile h3 {
        margin-top: 0;
    }

    .beer-tile a {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 3px;
        margin-top: 10px;
        margin-right: 5px;
    }

    .beer-tile a:hover {
        background-color: #0056b3;
    }

    .beer-tile form {
        display: inline-block;
    }

    .beer-tile button {
        background-color: transparent;
        border: none;
        cursor: pointer;
        font-size: 1.2em;
    }
</style>
@section('content')

    <div class="beer-container">
        @php $counter = 0; @endphp
        @foreach ($bier as $biertje)
            @if ($counter < 25)
                <div class="beer-tile">
                    <h3>{{$biertje->name}}</h3>
                    <p><strong>Brouwery:</strong> {{$biertje->brewer}}</p>
                    <p><strong>Type:</strong> {{$biertje->type}}</p>
                    <p><strong>Gist:</strong> {{$biertje->yeast}}</p>
                    <p><strong>Alcohol Percentage:</strong> {{$biertje->perc}}</p>
                    <p><strong>Aankoopprijs:</strong> {{$biertje->purchase_price}}</p>
                    <p><strong>Likes:</strong> {{$biertje->like_count}}</p>
                    <a href="{{route("bier.show", $biertje->id)}}">Show</a>
                    <form><button style="background-color: #434c5e; border-radius: 100px; width: 36px; height: 35px;">👍</button></form>
                    <form><button style="background-color: #434c5e; border-radius: 100px; width: 36px; height: 35px;">👎</button></form>
                </div>
                @php $counter++; @endphp
            @endif
        @endforeach
    </div>
@endsection
