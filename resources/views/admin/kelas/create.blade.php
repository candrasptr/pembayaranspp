@extends('admin/layout.master')

@section('title','Kelas')
@section('title2','tambah')
@section('kelas','active')
@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Tambah kelas</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('kelas.store') }}" method="POST">
    @csrf
    <div class="row">

        {{-- nama --}}
        <div class="col-md-6">
            <div class="form-group">
              <label @error('nama') class="text-danger" @enderror>
                nama kelas
                @error('nama')
                  | {{ $message }}
                @enderror
              </label>
              <input type="text" name="nama" value="{{old('nama')}}" class="form-control" autocomplete="off">  
            </div>
          </div>

          {{-- kompetensi --}}
          <div class="col-md-6">
            <div class="form-group">
              <label @error('kompetensi') class="text-danger" @enderror>
                kompetensi keahlian
                @error('kompetensi')
                  | {{ $message }}
                @enderror
              </label>
              <input type="text" name="kompetensi" value="{{old('kompetensi')}}" class="form-control" autocomplete="off">  
            </div>
          </div>              

    </div>    
      <div class="card-footer text-right">
        <button class="btn btn-primary mr-1" type="submit">Submit</button>
        <a href="/kelas" class="btn btn-secondary" type="reset">Cancel</a>
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

