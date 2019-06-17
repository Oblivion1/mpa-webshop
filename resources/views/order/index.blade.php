@extends('layouts.app')

@section('title')
    Orders
@endsection

@section('content')
<h1>Orders</h1>

<table>

    @foreach($orders as $order)
    <tr>
        <td>{{$order->created_at}}</td>
        <td>{{$order->updated_at}}</td>
        <td>{{$order->cart}}</td>
        <td>{{$order->name}}</td>
    </tr>
    @endforeach

</table>
@endsection


