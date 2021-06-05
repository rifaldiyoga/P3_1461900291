@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3>Tambah Siswa</h3>
                <form action="{{ route('siswa.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            Nama Siswa
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Alamat
                            <input type="text" class="form-control" name="alamat" id="alamat">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Guru
                            <select name="guru" id="guru" class="form-control">
                                @foreach ($guru as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="text-center p-3">

                        <button type="submit" class="btn btn-submit">Submit</button>
                    </div>
                    
                </form>
            </div>
            
        </div>
        
    </div>
</div>
    
@endsection