@extends('template.adminNilai')
@section('adminNilai')
    <div class="table-card prestasi-card-container">
        <div class=" text-center rounded px-3 mb-3">
            <div class="d-flex align-items-center justify-content-between mb-0">
                <h3>Edit Data Nilai Santri {{ $users->nama_lengkap }}</h3>
                <a class="btn btn-md btn-primary " style="margin-bottom:20px" href="{{ route('adminnilai') }}">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>
        <div class="page-content">
            <section class="section">
                <div class="card">
                    <form method="POST" action="{{ route('adminupdatenilai', $query->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Nama Santri</label>
                                                    <input value="{{ $users->nama_lengkap }}" disabled type="number"
                                                        inputmode="numeric" id="first-name-column" class="form-control"
                                                        placeholder="Nama Santri" name="">
                                                    <input value="{{ $users->id }}" hidden type="number"
                                                        inputmode="numeric" id="first-name-column" class="form-control"
                                                        placeholder="Nama Santri" name="user_id">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Adab">Adab</label>
                                                    <input value="{{ $query->Adab }}" type="number" inputmode="numeric"
                                                        id="Adab" class="form-control" placeholder="Nilai Adab"
                                                        name="Adab">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Aqidah">Aqidah</label>
                                                    <input value="{{ $query->Aqidah }}" type="number" inputmode="numeric"
                                                        id="Aqidah" class="form-control" placeholder="Nilai Aqidah"
                                                        name="Aqidah">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Akhlak">Akhlak</label>
                                                    <input value="{{ $query->Akhlak }}" type="number" inputmode="numeric"
                                                        id="Akhlak" class="form-control" placeholder="Nilai Akhlak"
                                                        name="Akhlak">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Fiqih">Fiqih</label>
                                                    <input value="{{ $query->Fiqih }}" type="number" inputmode="numeric"
                                                        id="Fiqih" class="form-control" placeholder="Nilai Fiqih"
                                                        name="Fiqih">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="IT"> IT </label>
                                                    <input value="{{ $query->IT }}" type="number" inputmode="numeric"
                                                        id="IT" class="form-control" placeholder="Nilai IT "
                                                        name="IT">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Hadis">Hadis</label>
                                                    <input value="{{ $query->Hadis }}" type="number" inputmode="numeric"
                                                        id="Hadis" class="form-control" placeholder="Nilai Hadis"
                                                        name="Hadis">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Quran">Quran</label>
                                                    <input value="{{ $query->Quran }}" type="number" inputmode="numeric"
                                                        id="Quran" class="form-control" placeholder="Nilai Quran"
                                                        name="Quran">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="BahasaArab">Bahasa Arab</label>
                                                    <input value="{{ $query->BahasaArab }}" type="number"
                                                        inputmode="numeric" id="BahasaArab" class="form-control"
                                                        placeholder="Nilai Bahasa Arab" name="BahasaArab">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="BahasaInggris">Bahasa Inggris</label>
                                                    <input value="{{ $query->BahasaInggris }}" type="number"
                                                        inputmode="numeric" id="BahasaInggris" class="form-control"
                                                        placeholder="Nilai Bahasa Inggris" name="BahasaInggris">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Public_Speaking">Public Speaking</label>
                                                    <input value="{{ $query->Public_Speaking }}" type="number"
                                                        inputmode="numeric" id="Public_Speaking" class="form-control"
                                                        placeholder="Nilai Public Speaking" name="Public_Speaking">
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">edit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
