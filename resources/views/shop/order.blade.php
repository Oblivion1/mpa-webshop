@extends('layouts.app')

@section('title')
    Shopping-cart
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
			<h1>Checkout</h1>
			@foreach($products as $product)
						<li class="list-group-item">
							<span class="badge">{{ $product['qty'] }}</span>
							<strong>{{ $product['item']['name'] }}</strong>
							<span class="label label-succes">€ {{ $product['price'] }}</span>
						</li>
					@endforeach
			<h4> totaal:€ {{ $total }}</h4>
			

					{{ Form::open(['action' => "OrderController@create",'method' => 'POST'])}}
					<table>
						<tr>
							<td>{{Form::label('firstname', 'Voornaam')}}</td>
							<td>{{Form::text('Voornaam')}}</td>
						</tr>
						<tr>
							<td>{{Form::label('lastname', 'Achternaam')}}</td>
							<td>{{Form::text('Achternaam')}}</td>
						</tr>
						<tr>
							<td>{{Form::label('city', 'Stad')}}</td>
							<td>{{Form::text('Stad')}}</td>
						</tr>
						<tr>
							<td>{{Form::label('adress', 'Addres')}}</td>
							<td>{{Form::text('Addres')}}</td>
						</tr>
						<tr>
							<td>{{Form::label('postal', 'Postcode')}}</td>
							<td>{{Form::text('Postcode')}}</td>
						</tr>
					</table>
					{{Form::submit('Bevestig') }}
					{{Form::close() }}
					
					

			
		</div>
	</div>

@endsection