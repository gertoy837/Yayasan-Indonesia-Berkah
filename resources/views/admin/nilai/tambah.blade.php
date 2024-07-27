@extends('template.adminNilai')
@section('adminNilai')
    <div class="table-card prestasi-card-container">
        <div class=" text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-0">
                <h3 class="mb-0">Tambah Data Nilai Santri</h3>
                <a class="btn btn-md btn-primary " style="margin-bottom:20px" href="{{ route('adminnilai') }}"><i
                        class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="POST" action="{{ route('adminstorenilai') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="basicSelect">Nama Santri</label>
                                    <select class="form-select" id="basicSelect" name="user_id">
                                        <option hidden>Nama Santri</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="Adab">Adab</label>
                                    <input inputmode="numeric" type="number" id="Adab" class="form-control"
                                        placeholder="Nilai Adab" name="Adab">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="Aqidah">Aqidah</label>
                                    <input inputmode="numeric" type="number" id="Aqidah" class="form-control"
                                        placeholder="Nilai Aqidah" name="Aqidah">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="Akhlak">Akhlak</label>
                                    <input inputmode="numeric" type="number" id="Akhlak" class="form-control"
                                        placeholder="Nilai Akhlak" name="Akhlak">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="Fiqih">Fiqih</label>
                                    <input inputmode="numeric" type="number" id="Fiqih" class="form-control"
                                        placeholder="Nilai Fiqih" name="Fiqih">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="IT"> IT </label>
                                    <input inputmode="numeric" type="number" id="IT" class="form-control"
                                        placeholder="Nilai IT " name="IT">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="Hadis">Hadis</label>
                                    <input inputmode="numeric" type="number" id="Hadis" class="form-control"
                                        placeholder="Nilai Hadis" name="Hadis">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="Quran">Quran</label>
                                    <input inputmode="numeric" type="number" id="Quran" class="form-control"
                                        placeholder="Nilai Quran" name="Quran">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="BahasaArab">Bahasa Arab</label>
                                    <input inputmode="numeric" type="number" id="BahasaArab" class="form-control"
                                        placeholder="Nilai Bahasa Arab" name="BahasaArab">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="BahasaInggris">Bahasa Inggris</label>
                                    <input inputmode="numeric" type="number" id="BahasaInggris" class="form-control"
                                        placeholder="Nilai Bahasa Inggris" name="BahasaInggris">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="Public_Speaking">Public Speaking</label>
                                    <input inputmode="numeric" type="number" id="Public_Speaking" class="form-control"
                                        placeholder="Nilai Public_Speaking" name="Public_Speaking">
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
