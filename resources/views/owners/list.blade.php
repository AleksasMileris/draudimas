@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Savininkai</div>

                    <div class="card-body">
{{--                        @if(Auth::user()->user_type !== null && Auth::user()->user_type == 'admin')--}}
                        <a class="btn btn-success float-end" href="{{route("owners.create")}}">Pridėti savininką</a>
{{--                        @endif--}}

                        <form class="" method="post" action="{{route('owners.search')}}">
                            @csrf
                        <div class="mb-3 mt-3 col-md-7 d-flex">


                                    <div>
                                    <label class="form-label">Vardas</label>
                                    <input class="form-control " type="text" name="name" value="{{$name}}" placeholder="Vardas">
                                    </div>

                                    <div>
                                    <label class="form-label">Pavarde</label>
                                    <input class="form-control  " type="text" name="surname" value="{{$surname}}" placeholder="Pavarde">
                                    </div>

                            </div>
                     <button class="btn btn-info ">Ieškoti</button>



                        </form>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Vardas </th>
                                <th>Pavarde</th>

                                <th></th>
                            </tr>
                            </thead>
                            <tbody>


                                @foreach($owners as $owner)
                                    <tr>
                                    <td>{{$owner->name}}</td>
                                    <td>{{$owner->surname}}</td>



                                        <td class="col-md-3"><a class="btn btn-info" href="{{route("owners.update", $owner->id)}}">Redaguoti</a>
                                        <a class="btn btn-danger" href="{{route("owners.delete", $owner->id)}}">Ištrinti</a></td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <b>Mike</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

