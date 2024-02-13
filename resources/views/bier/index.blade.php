@extends('layouts.head')
<style> 
    
</style>
@section('content')
    <div class="beer-container">
        @foreach ($bier as $biertje)
            <div class="beer-tile">
                <h3>{{$biertje->name}}</h3>
                <p><strong>Brouwerij:</strong> {{$biertje->brewer}}</p>
                <p><strong>Type:</strong> {{$biertje->type}}</p>
                <p><strong>Gist:</strong> {{$biertje->yeast}}</p>
                <p><strong>Alcohol Percentage:</strong> {{$biertje->perc}}%</p>
                <p><strong>Aankoopprijs:</strong> €{{$biertje->purchase_price}}</p>
                <p><strong>Likes:</strong> {{$biertje->like_count}}</p>
                <a href="{{route("bier.show", $biertje->id)}}">Show</a>
                <form><button style="background-color: #434c5e; border-radius: 100px; width: 36px; height: 35px;">👍</button></form>
                <form><button style="background-color: #434c5e; border-radius: 100px; width: 36px; height: 35px;">👎</button></form>
            </div>
        @endforeach
    </div>

    <ul class="pagination">
        @if ($bier->currentPage() > 1)
            <li><a href="{{ $bier->previousPageUrl() }}">Vorige</a></li>
        @endif
        @if ($bier->hasMorePages())
            <li><a href="{{ $bier->nextPageUrl() }}">Volgende</a></li>
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
