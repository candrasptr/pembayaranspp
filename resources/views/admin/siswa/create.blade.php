@extends('admin/layout.master')

@section('title','Siswa')
@section('title2','tambah')
@section('siswa','active')
{{-- @push('page-styles')
<link rel="stylesheet" href="{{ asset('node_modules/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">
@endpush --}}
@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Tambah siswa</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('siswa.store') }}" method="POST">
    @csrf
    <div class="row">

        {{-- nisn --}}
        <div class="col-md-6">
            <div class="form-group">
              <label @error('nisn') class="text-danger" @enderror>
                NISN
                @error('nisn')
                  | {{ $message }}
                @enderror
              </label>
              <input type="text" name="nisn" value="{{old('nisn')}}" class="form-control" autocomplete="off">  
            </div>
          </div>

          {{-- nis --}}
          <div class="col-md-6">
            <div class="form-group">
              <label @error('nis') class="text-danger" @enderror>
                NIS
                @error('nis')
                  | {{ $message }}
                @enderror
              </label>
              <input type="text" name="nis" value="{{old('nis')}}" class="form-control" autocomplete="off">  
            </div>
          </div>

          

      <div class="col-md-6">
          <div class="form-group">
            <label @error('nama') class="text-danger" @enderror>
              Nama siswa 
              @error('nama')
                | {{ $message }}
              @enderror
            </label>
            <input type="text" name="nama" value="{{old('nama')}}" class="form-control" autocomplete="off">  
          </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Nama kelas</label>
                <select name="kelas" class="form-control">
                    @foreach ($data as $item)
                    <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" cols="30" rows="1" class="form-control"></textarea>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label @error('notelp') class="text-danger" @enderror>
                    No telp
                    @error('notelp')
                      | {{ $message }}
                    @enderror
                  </label>
                  <input type="text" name="notelp" value="{{old('notelp')}}" class="form-control" autocomplete="off">        
            </div>
        </div>              

    </div>    
      <div class="card-footer text-right">
        <button class="btn btn-primary mr-1" type="submit">Submit</button>
        <a href="/siswa" class="btn btn-secondary" type="reset">Cancel</a>
      </div>
    </form>
  </div>
</div>

@endsection

{{-- @push('page-scripts')
<script src="{{ asset('node_modules/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('node_modules/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
<script src="{{ asset('node_modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('node_modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script>
@endpush --}}

