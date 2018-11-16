@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Catogary</div>

                <div class="card-body">
                        <form method="POST" action="{{ url('/addList') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="Category" class="col-sm-4 col-form-label text-md-right">Enter Category</label>
        
                                    <div class="col-md-6">
                                        <input id="category" type="category" class="form-control" name="category" value="{{ old('category') }}" required autofocus>
        
                                        @if ($errors->has('Category'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('category') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add Category
                                        </button>
                                    </div>
                                </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
