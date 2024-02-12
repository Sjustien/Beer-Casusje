@extends('layouts.head')
@section('content')
   
    <table>
        <tr>
            <td>
                Dubbelfris
            </td>
        </tr>
        @foreach ($bier as $biertje)
            <tr>
                <td>
                    {{$biertje->name}}
                </td>
                <td>
                    
                </td>
            </tr>
        @endforeach
    </table>
@endsection