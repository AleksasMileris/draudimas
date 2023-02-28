@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Savininkai</div>

                    <div class="card-body">
                        <form method="post" action="{{route("cars.update",$car->id)}}">
                            @csrf
                            @method("put")
                            <div>

                                <label class="form-label mb-4">Registracijos Numeris</label>
                                <input type="text" class="form-control" name="reg_number" value="{{ $car->reg_number }}">

                                <label class="form-label mb-4">Gamintojas</label>
                                <input type="text" class="form-control" name="brand" value="{{ $car->brand }}">

                                <label class="form-label mb-4">Modelis</label>
                                <input type="text" class="form-control" name="model" value="{{ $car->model }}">


                                <label class="form-label mb-4">Savininkas</label>
                                <select name="owner_id" class="form-select">

                                    @foreach($owners as $owner)
                                        <option value="{{$owner->id}}" @if($owner->id==$car->owner_id) selected @endif >{{$owner->name}}</option>
                                    @endforeach

                                </select>



                            </div>
                            <button class="btn btn-success mt-2">Išsaugoti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
