@extends('layouts.admin')

@section('yazan')
<style>
    /* svg{
width: 50px;
    } */
</style>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Producten</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
            <a class="btn btn-success" href="{{ url('create') }}">Voeg een product toe</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Afbeelding</th>
            <th>Title</th>
            <th>Omschrijving</th>
            <th width="280px">Actie</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src=" {{ asset($product->image) }}" width="100px"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <form action="{{ route('destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('show',$product->id) }}">Zie meer</a>

                    <a class="btn btn-primary" href="{{ route('edit',$product->id) }}">Bewerken</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Verwijderen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection
