@extends('layouts.head')
@section('content')
    <table>
        <tr>
            <td>
                {{ $bier->name }}
            </td>
            <td>
                {{ $bier->brewer }}
            </td>
            <td>
                {{ $bier->type }}
            </td>
            <td>
                {{ $bier->yeast }}
            </td>
            <td>
                {{ $bier->perc }}
            </td>
            <td>
                {{ $bier->purchase_price }}
            </td>
            <td>
                {{ $bier->like_count }}
            </td>
        </tr>
    </table>
@endsection
