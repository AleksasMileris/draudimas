@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Savininkai</div>

                    <div class="card-body">
                      <form method="post" action="{{route("owners.store")}}">
                          @csrf
                          <div>
                              <label class="form-label mb-4">Vardas</label>
                              <input type="text" class="form-control" name="name">
                              <label class="form-label mb-4">Pavarde</label>
                              <input type="text" class="form-control" name="surname">
                          </div>
                          <button class="btn btn-success mt-2">Pridėti</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
