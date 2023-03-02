@extends('layouts.admin')

@section('yazan')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ $product->name }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/product"> Terug</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {{ $product->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Omschrijving:</strong>
            {{ $product->description }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Afbeelding:</strong>
            <img src="{{ asset( $product->image) }}" width="500px">
        </div>
    </div>
</div>
@endsection
