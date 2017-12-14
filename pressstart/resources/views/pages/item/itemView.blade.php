@extends ('layout.master')

@section ('content')

<div class="container">
	<div class="row">

		<div class="col-md-2"></div>

		<div class="col-md-8">
			<h2 class="text-center">Item View</h2>

			<form action="/item/{{ $item->id }}" method="POST">
				{{ csrf_field() }}
				<div class="row">
					<div class="form-group col-md-12">
						<label for="itemName">Name/Title</label>
						<input name="itemName" type="text" class="form-control" id="itemName" value="{{ $item->itemName }}" required/>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="releaseDate">Release Date</label>
						<input name="releaseDate" type="text" class="form-control" id="releaseDate" value="{{ $item->releaseDate }}" required/>
					</div>
					<div class="form-group col-md-6">
						<label for="developer">Developer</label>
						<input name="developer" type="text" class="form-control" id="developer" value="{{ $item->developer }}" required/>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<label for="formGroupDescription">Description</label>
						<input name="description" type="text" class="form-control" id="formGroupDescription" value="{{ $item->description }}" required/>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="formGroupType">Product Type</label>
						<select name="productType" class="form-control">
							<option value="game" selected>Game</option>
							<option value="console">Console</option>
							<option value="accessory">Accessory</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="formGroupType">Condition</label>
						<select name="conditionID" class="form-control">
							<option value="New" selected>New</option>
							<option value="Good">Good</option>
							<option value="Okay">Okay</option>
							<option value="Poor">Poor</option>
						</select>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="formGroupPrice">Price</label>
						<input name="price" type="text" class="form-control" id="formGroupPrice" value="{{ $item->price }}" required/>
					</div>
					<div class="form-group col-md-6">
						<label for="formGroupType">Console</label>
						<select name="console" class="form-control">
							<option value="ps4" selected>Playstation 4</option>
							<option value="xbox1">xBox One</option>
							<option value="nintendo_switch">Nintendo Switch</option>
							<option value="snes">Super Nintendo</option>
						</select>
					</div>
				</div>
				<div class="row text-center">
					<button type="submit" class="btn btn-primary">Save</button>
					<a href="#" class="btn btn-danger">Cancel</a>
				</div>
			</form>
		</div>

		<div class="col-md-2"></div>

	</div>
</div>

@endsection