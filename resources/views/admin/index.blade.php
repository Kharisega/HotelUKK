@extends('dashboard')

@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Administrator</h2>
            </div>
            <div class="pull-right mt-4 mb-4">
                <a href="{{ route('admin.create') }}" class="btn btn-success">Tambah Data</a>
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
            <th>ID Administrator</th>
            <th>Username</th>
            <th>E-mail</th>
            {{-- <th>Password</th> --}}
            <th>Aksi</th>
        </tr>
        @foreach ($admin as $i => $adminn)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $adminn->model_id }}</td>
            <td>{{ $adminn->name }}</td>
            <td>{{ $adminn->email }}</td>
            {{-- <td>{{ $adminn->password }}</td> --}}
            <td>
                <form action="{{ route('admin.destroy', $adminn->model_id) }}" method="POST">
                    <a href="{{ route('admin.edit',$adminn->model_id) }}" class="btn btn-primary">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Hapus</button>

                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $admin->links() !!}
</div>
@endsection
