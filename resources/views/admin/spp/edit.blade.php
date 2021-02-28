@extends('admin/layout.master')

@section('title','Spp')
@section('title2','tambah')
@section('spp','active')
@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Edit spp</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('spp.update',$data->id_spp) }}" method="POST">
    @method('PATCH')
    @csrf
    <div class="row">

        {{-- Tahun --}}
        <div class="col-md-6">
            <div class="form-group">
              <label @error('tahun') class="text-danger" @enderror>
                Tahun
                @error('tahun')
                  | {{ $message }}
                @enderror
              </label>
              <input type="text" name="tahun" 
              @if (old('tahun'))
                  value="{{old('tahun')}}"
              @else
                  value="{{ $data->tahun }}"
              @endif
              class="form-control" autocomplete="off">  
            </div>
          </div>

          {{-- Nominal --}}
          <div class="col-md-6">
            <div class="form-group">
              <label @error('nominal') class="text-danger" @enderror>
                Nominal
                @error('nominal')
                  | {{ $message }}
                @enderror
              </label>
              <input type="number" name="nominal"  
              @if (old('nominal'))
                  value="{{old('nominal')}}"
              @else
                  value="{{ $data->nominal }}"
              @endif
              class="form-control" autocomplete="off">  
            </div>
          </div>              

    </div>    
      <div class="card-footer text-right">
        <button class="btn btn-primary mr-1" type="submit">Submit</button>
        <a href="/spp" class="btn btn-secondary" type="reset">Cancel</a>
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

