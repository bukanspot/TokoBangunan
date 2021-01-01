@extends('../layout/app')

@section('title', 'Data Barang')
@section('isi')
    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Daftar Barang</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                        <colgroup>
                            <col span="1" style="width: 5%;">
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 35%;">
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 20%;">
                        </colgroup>
                        <thead class=" text-primary">
                            <th>
                                No
                            </th>
                            <th>
                                Kode
                            </th>
                            <th>
                                Nama Barang
                            </th>
                            <th>
                                Jenis
                            </th>
                            <th>
                                Satuan
                            </th>
                            <th>
                                Aksi
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($barang as $barang)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $barang->kode }}
                                    </td>
                                    <td>
                                        {{ $barang->nama_barang }}
                                    </td>
                                    <td>
                                        {{ $barang->jenis->jenis }}
                                    </td>
                                    <td>
                                        {{ $barang->satuan->satuan }}
                                    </td>
                                    <td>
                                        <button class="btn" data-toggle="modal" href="#edit">Edit</button>
                                        <button class="btn" data-toggle="modal" href="#delete">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Tambah Jenis</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/barang">
                    @method('post')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="nama_barang" class="bmd-label-floating">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="kode" class="bmd-label-floating">Kode Barang</label>
                            <input type="number" class="form-control" name="kode">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="jenis_id" class="dropdown-item2 form-control ">
                                    <option>Jenis</option>
                                    @foreach ($jenis as $jenis)
                                        <option value="{{ $jenis->jenis->id }}">{{ $jenis->jenis->jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="satuan_id" class="dropdown-item2 form-control ">Satuan
                                    <option>Satuan</option>
                                    @foreach ($satuan as $satuan)
                                        <option value="{{ $satuan->satuan->id }}">{{ $satuan->satuan->satuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="stok" class="bmd-label-floating">Jumlah</label>
                            <input type="number" class="form-control" name="stok">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="harga_jual" class="bmd-label-floating">Harga</label>
                            <input type="number" class="form-control" name="harga_jual">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                        <button type="submit" class="btn btn-primary pull-right">Tambah</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
        </div>
        </div>
    </div>

    <!-- Edit -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <form method="POST" action="/barang/{{ $barang->id }}">
            @method('patch')
            @csrf
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="edit">Edit Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="nama_barang" class="bmd-label-floating">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" value="{{ $barang->nama_barang }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="kode" class="bmd-label-floating">Kode Barang</label>
                                <input type="text" class="form-control" name="kode" value="{{ $barang->kode }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="jenis_id" class="dropdown-item2 form-control ">
                                        <option>Jenis</option>
                                        {{-- @foreach ($jenis as $jenis)
                                            <option value="{{ $jenis->jenis->id }}">{{ $jenis->jenis->jenis }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="satuan_id" class="dropdown-item2 form-control ">Satuan
                                        <option>Satuan</option>
                                        {{-- @foreach ($satuan as $satuan)
                                            <option value="{{ $satuan->satuan->id }}">{{ $satuan->satuan->satuan }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="harga_jual" class="bmd-label-floating">Harga</label>
                                <input type="number" class="form-control" name="harga_jual">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Delete -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
        <form method="POST" action="/barang/{{ $barang->id }}">
            @method('delete')
            @csrf
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="delete">Delete Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>Apakah yakin mau menghapus {{ $barang->nama_barang }}?</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Iya</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection