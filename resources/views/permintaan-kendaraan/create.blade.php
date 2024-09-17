@extends("layouts.layouts")

@section("konten")
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('permintaan.kendaraans') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Permintaan Kendaraan</h1>
            </div>
            <div class="section-body">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-12">
                            <div class="card">
                                <form action="{{ route('permintaan.kendaraans.store') }}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="card-header">
                                        <h4>Tambah Permintaan</h4>
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="nomor_pesanan" value="{{ $nomor }}">
                                        <input type="hidden" name="status" value="pending">
                                        <div class="form-group">
                                            <label>Nomor Pesanan</label>
                                            <input type="text" class="form-control" value="{{ $nomor }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Kendaraan</label>
                                            <select class="form-control" name="kendaraan_id">
                                                @foreach($kendaraan as $k)
                                                    <option value="{{ $k->id }}"> {{ $k->merk }} - {{ $k->nama }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('kendaraan_id'))
                                                <span class="text-danger">{{ $errors->first('kendaraan_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Awal</label>
                                            <input type="date" class="form-control" name="tanggal"  value="{{ old("tanggal") }}" >
                                            @if ($errors->has('tanggal'))
                                                <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Akhir</label>
                                            <input type="date" class="form-control" name="tanggal_akhir"  value="{{ old("tanggal_akhir") }}" >
                                            @if ($errors->has('tanggal_akhir'))
                                                <span class="text-danger">{{ $errors->first('tanggal_akhir') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Propinsi</label>
                                            <input type="text" class="form-control" name="propinsi"  value="{{ old("propinsi") }}" >
                                            @if ($errors->has('propinsi'))
                                                <span class="text-danger">{{ $errors->first('propinsi') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Kota</label>
                                            <input type="text" class="form-control" name="kota"  value="{{ old("kota") }}" >
                                            @if ($errors->has('kota'))
                                                <span class="text-danger">{{ $errors->first('kota') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Jam Awal</label>
                                            <input type="text" class="form-control timepicker" name="jam_awal"  value="{{ old("jam_awal") }}" >
                                            @if ($errors->has('jam_awal'))
                                                <span class="text-danger">{{ $errors->first('jam_awal') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Jam Akhir</label>
                                            <input type="text" class="form-control timepicker" name="jam_akhir"  value="{{ old("jam_akhir") }}" >
                                            @if ($errors->has('jam_akhir'))
                                                <span class="text-danger">{{ $errors->first('jam_akhir') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat 1</label>
                                            <input type="text" class="form-control" name="alamat_1"  value="{{ old("alamat_1") }}" >
                                            @if ($errors->has('alamat_1'))
                                                <span class="text-danger">{{ $errors->first('alamat_1') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat 2</label>
                                            <input type="text" class="form-control" name="alamat_2"  value="{{ old("alamat_2") }}" >
                                            @if ($errors->has('alamat_2'))
                                                <span class="text-danger">{{ $errors->first('alamat_2') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="{{ route('permintaan.kendaraans') }}" class="btn btn-info">Kembali</a>
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('addJs')
    <script>
        $('#yearpicker').datepicker({
            format: "yyyy",         // Year format
            viewMode: "years",      // Show only the years
            minViewMode: "years",   // Prevent viewing months and days
            autoclose: true         // Close after year selection
        });
    </script>
@endsection
