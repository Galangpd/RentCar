@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Data Pesan</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $message->nama }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->pesan }}</td>
                            <td>
                                {{-- <a href="{{ route('admin.messages.edit', $message->edit) }}" class="btn btn-sm btn-warning">Edit</a> --}}
                                <form onclick="confirm('Anda yakin ingin menghapus data ini?')" class="d-inline" action="{{ route('admin.message.destroy', $message->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection