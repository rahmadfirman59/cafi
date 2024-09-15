@extends("layouts.layouts")

@section("konten")
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('kendaraans') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Kendaraan</h1>
            </div>
            <div class="section-body">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-12">
                            <div class="card">
                                <form action="{{ route('kendaraans.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h4>Ubah Kendaraan</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nomor Polisi</label>
                                            <input type="text" class="form-control" name="nomor_polisi"  value="{{ $data->nomor_polisi }}" >
                                            @if ($errors->has('nomor_polisi'))
                                                <span class="text-danger">{{ $errors->first('nomor_polisi') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama"  value="{{ $data->nama }}" >
                                            @if ($errors->has('nama'))
                                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Kapasitas</label>
                                            <input type="text" class="form-control" name="kapasitas"  value="{{ $data->kapasitas }}" >
                                            @if ($errors->has('kapasitas'))
                                                <span class="text-danger">{{ $errors->first('kapasitas') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Merk Kendaraan</label>
                                            <input type="text" class="form-control" name="merk"  value="{{ $data->merk }}" >
                                            @if ($errors->has('merk'))
                                                <span class="text-danger">{{ $errors->first('merk') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input type="text" id="yearpicker" class="form-control" name="tahun"  value="{{ $data->tahun }}" >
                                            @if ($errors->has('tahun'))
                                                <span class="text-danger">{{ $errors->first('tahun') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" class="dropify" name="foto_kendaraan"  data-default-file="{{ url('storage/'.$data->foto) }}" >

                                        </div>
                                        <div class="form-group">
                                            <label>Masa Berlaku Kendaraan</label>
                                            <input type="date" class="form-control" name="masa_berlaku"  value="{{ old("masa_berlaku") }}" >
                                            @if ($errors->has('masa_berlaku'))
                                                <span class="text-danger">{{ $errors->first('masa_berlaku') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Servis Terakhir</label>
                                            <input type="date" class="form-control" name="servis_terakhir"  value="{{ old("servis_terakhir") }}" >
                                            @if ($errors->has('masa_berlaku'))
                                                <span class="text-danger">{{ $errors->first('masa_berlaku') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>IMEI</label>
                                            <input type="text" class="form-control" name="imei"  value="{{ old("imei") }}" >
                                            @if ($errors->has('imei'))
                                                <span class="text-danger">{{ $errors->first('imei') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="{{ route('kendaraans') }}" class="btn btn-info">Kembali</a>
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
