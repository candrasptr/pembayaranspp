@extends('admin/layout.master')

@section('title','Petugas')
@section('title2','tambah')
@section('petugas','active')
@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Edit petugas</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('petugas.update',$data->id_petugas) }}" method="POST">
        @method('PATCH')
    @csrf
    <div class="row">

        {{-- nama --}}
        <div class="col-md-6">
            <div class="form-group">
              <label @error('nama') class="text-danger" @enderror>
                nama petugas
                @error('nama')
                  | {{ $message }}
                @enderror
              </label>
              <input type="text" name="nama"  
              @if (old('nama'))
                  value="{{old('nama')}}"
              @else
                  value="{{ $data->nama_petugas }}"
              @endif
              class="form-control" autocomplete="off">  
            </div>
          </div>

          {{-- username --}}
          <div class="col-md-6">
            <div class="form-group">
              <label @error('username') class="text-danger" @enderror>
                Username
                @error('username')
                  | {{ $message }}
                @enderror
              </label>
              <input type="text" name="username"  
              @if (old('username'))
                  value="{{old('username')}}"
              @else
                  value="{{ $data->username }}"
              @endif
              class="form-control" autocomplete="off">  
            </div>
          </div>
          
          {{-- password --}}
          <div class="col-md-6">
            <div class="form-group">
              <label @error('password') class="text-danger" @enderror>
                password
                @error('password')
                  | {{ $message }}
                @enderror
              </label>
              <input type="password" name="password"  
              @if (old('password'))
                  value="{{old('password')}}"
              @else
                  
              @endif
              class="form-control" autocomplete="off">  
            </div>
          </div>

          {{-- kompetensi --}}
          <div class="col-md-6">
            <div class="form-group">
              <label @error('level') class="text-danger" @enderror>
                Level
                @error('level')
                  | {{ $message }}
                @enderror
              </label>
              <select name="level" class="form-control">
                  <option value="admin" class="form-control">Admin</option>
                  <option value="petugas" class="form-control">Petugas</option>
              </select>
            </div>
          </div>

    </div>    
      <div class="card-footer text-right">
        <button class="btn btn-primary mr-1" type="submit">Submit</button>
        <a href="/petugas" class="btn btn-secondary" type="reset">Cancel</a>
      </div>
    </form>
  </div>
</div>

@endsection

