@extends('app')

@section('content')
<div >
    <div class="row">
        <a href="{{ route('siswa.create') }}">Tambah</a> 
        <form action="/siswa/cari" method="get">
            <input type="text" name="cari" id="cari" value="{{ old('cari') }}">
            <input type="submit" value="CARI">
        </form>
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">

                        <table class="table">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>Nama</td>
                                    <td>Alamat</td>
                                    <td>Kelas</td>
                                    <td>Guru</td>
                                    <td>Action</td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $a = 1
                                ?>
                                @foreach ($siswa as $item)
                                <tr>
                                    <td>{{ $a++ }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->mengajar }}</td>
                                    <td>{{ $item->nama_guru }}</td>
                                    <td>
                                        <form action="{{ route('siswa.destroy',$item->id)  }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-delete">Delete</button>
                                        </form>
                                    
                                        <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-delete">Edit</a>
                                    </td>
                                </tr>    
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</div>
@endsection