@extends('layouts.head')
<style>
    body {
        font-family: verdana;
    }
.beer-details {
    margin-bottom: 20px;
}

.comment-form input[type="text"] {
    width: 300px;
    padding: 5px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.comment-form button {
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.comments {
    margin-top: 20px;
}

.comments table {
    border-collapse: collapse;
    width: 100%;
}

.comments table td {
    border: 1px solid #ccc;
    padding: 8px;
}

.comments table td:first-child {
    width: 80%;
}
</style>
@section('content')
    <div class="beer-details">
        <h3>{{ $bier->name }}</h3>
        <p><strong>Brewer:</strong> {{ $bier->brewer }}</p>
        <p><strong>Type:</strong> {{ $bier->type }}</p>
        <p><strong>Yeast:</strong> {{ $bier->yeast }}</p>
        <p><strong>Alcohol Percentage:</strong> {{ $bier->perc }}% </p>
        <p><strong>Purchase Price:</strong> €{{ $bier->purchase_price }}</p>
        <p><strong>Likes:</strong> {{ $bier->like_count }}</p>
    </div>

    <form action="{{ route('comments.store', $bier->id) }}" method="POST" class="comment-form">
        @csrf
        <input type="text" name="content" id="content" placeholder="Add a comment...">
        <button type="submit">Submit</button>
    </form>

    <div class="comments">
        <h3>Comments</h3>
        <table>
            @foreach ($comments as $comment)
            <tr>
                <td>
                    {{ $comment->content }}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
