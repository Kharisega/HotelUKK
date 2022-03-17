@extends('dashboard')

@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Resepsionis</h2>
            </div>
            <div class="pull-right mt-4 mb-4">
                <a href="{{ route('resepsionis.create') }}" class="btn btn-success">Tambah Data</a>
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
            <th>No</th>
            <th>ID Resepsionis</th>
            <th>Username</th>
            <th>E-mail</th>
            {{-- <th>Password</th> --}}
            <th>Aksi</th>
        </tr>
        @foreach ($resepsionis as $i => $resepsioniss)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $resepsioniss->model_id }}</td>
                <td>{{ $resepsioniss->name }}</td>
                <td>{{ $resepsioniss->email }}</td>
                {{-- <td>{{ $resepsioniss->password }}</td> --}}
                <td>
                    <form action="{{ route('resepsionis.destroy', $resepsioniss->model_id) }}" method="POST">
                        <a href="{{ route('resepsionis.edit',$resepsioniss->model_id) }}" class="btn btn-primary">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Hapus</button>

                    </form>
                </td>
            </tr>
            @endforeach
    </table>

    {!! $resepsionis->links() !!}
</div>
@endsection