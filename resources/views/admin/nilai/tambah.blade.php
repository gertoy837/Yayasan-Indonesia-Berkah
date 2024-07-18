@extends('template.adminNilai')
@section('adminNilai')
<div class="table-card prestasi-card-container">
    <div class=" text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h3 class="mb-0">Tambah Data Nilai Santri</h3>
            <a class="btn btn-md btn-primary " style="margin-bottom:20px" href="{{ route('adminnilai') }}"><i
                    class="fas fa-arrow-left mr-2"></i>Kembali</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Masukkan Data Nilai Santri</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('adminstorenilai') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Nama Santri</label>
                                <select class="form-select" id="basicSelect" name="namasantri">
                                    <option hidden>Nama Santri</option>
                                    @foreach ($santri as $item)
                                    <option value="{{$item->nama_santri}}">{{$item->nama_santri}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Fiqih</label>
                                <input value type="no" id="first-name-column" class="form-control"
                                placeholder="Nilah Fiqih" name="Fiqih">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column"> IT </label>
                                <input value type="no" id="first-name-column" class="form-control"
                                placeholder="Nilai IT " name="IT">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Hadis</label>
                                <input value type="no" id="first-name-column" class="form-control"
                                placeholder="Nilai Hadis" name="Hadis">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Quran</label>
                                <input value type="no" id="first-name-column" class="form-control"
                                placeholder="Nilai Quran" name="Quran">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Bahasa Arab</label>
                                <input value type="no" id="first-name-column" class="form-control"
                                placeholder="Nilai Bahasa Arab" name="BahasaArab">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Bahasa Inggris</label>
                                <input value type="no" id="first-name-column" class="form-control"
                                placeholder="Nilai Bahasa Inggris" name="BahasaInggris">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Polygon</label>
                                <input value type="no" id="first-name-column" class="form-control"
                                placeholder="Nilai Polygon" name="Polygon">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">submit</button>
                            {{-- <a href="{{ route('mutabaah') }}" type="reset" class="btn btn-light-secondary me-1 mb-1">Kembali</a> --}}
                        </div>       
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="page-content"> 
        <section class="section">
            <div class="card">
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            
                        </div>
                    </div>
                </section>
            </div>
        </section>
    <div> --}}
</div>       
@endsection