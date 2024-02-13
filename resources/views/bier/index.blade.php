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
        @foreach ($bier as $biertje)
            <div class="beer-tile">
                <h3>{{ $biertje->name }}</h3>
                <p><strong>Brouwery:</strong> {{ $biertje->brewer }}</p>
                <p><strong>Type:</strong> {{ $biertje->type }}</p>
                <p><strong>Gist:</strong> {{ $biertje->yeast }}</p>
                <p><strong>Alcohol Percentage:</strong> {{ $biertje->perc }}</p>
                <p><strong>Aankoopprijs:</strong> {{ $biertje->purchase_price }}</p>
                <p><strong>Likes:</strong> {{ $biertje->like_count }}</p>
                <a href="{{ route('bier.show', $biertje->id) }}">Show</a>
                <button onclick="likeButton({{ $biertje->id }})"
                    style="background-color: #434c5e; border-radius: 100px; width: 36px; height: 35px;">👍</button>
                <form><button style="background-color: #434c5e; border-radius: 100px; width: 36px; height: 35px;">👎</button>
                </form>
            </div>
        @endforeach
        @if ($bier->currentPage() > 1)
            <td class='w-3/5 text-left'><a href="{{ $bier->previousPageUrl() }}">Vorige</a></td>
        @endif
        @if ($bier->hasMorePages())
            <td class='w-1/2 text-right'><a href="{{ $bier->nextPageUrl() }}">Volgende</a></td>
        @endif
    </div>

    <script>
        function likeButton(beerId) {
            axios
                .put(`/bier/${beerId}`, {
                    // Remove the position field
                })
                .then(response => {
                    console.log(beerId);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    </script>
@endsection
