@extends('layouts.head')
<style> 
    
</style>
@section('content')
    <div class="beer-container">
        @foreach ($bier as $biertje)
            <div class="beer-tile" data-beer-id="{{$biertje->id}}">
                <h3>{{$biertje->name}}</h3>
                <p><strong>Brouwerij:</strong> {{$biertje->brewer}}</p>
                <p><strong>Type:</strong> {{$biertje->type}}</p>
                <p><strong>Gist:</strong> {{$biertje->yeast}}</p>
                <p><strong>Alcohol Percentage:</strong> {{$biertje->perc}}%</p>
                <p><strong>Aankoopprijs:</strong> €{{$biertje->purchase_price}}</p>
                <p><strong>Likes:</strong> <span class="like-count">{{$biertje->like_count}}</span></p>
                <a href="{{route("bier.show", $biertje->id)}}">Show</a>
                <button onclick="likeButton({{$biertje->id}})" style="background-color: #434c5e; border-radius: 100px; width: 36px; height: 35px;">👍</button>
                <button onclick="likeButton({{$biertje->id}})" style="background-color: #434c5e; border-radius: 100px; width: 36px; height: 35px;">👎</button>
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
        const beerTile = document.querySelector(`.beer-tile[data-beer-id="${beerId}"]`);
        
        if (beerTile) {
            axios
                .put(`/bier/${beerId}`, {})
                .then(response => {
                    const updatedLikeCount = response.data.like_count;
                    
                    const likeCountElement = beerTile.querySelector('.like-count');
                    
                    if (likeCountElement) {
                        likeCountElement.innerText = updatedLikeCount;
                    } else {
                        console.error('Like count element not found');
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        } else {
            console.error('Beer tile element not found');
        }
    }
</script>


@endsection
