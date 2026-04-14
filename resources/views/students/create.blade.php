@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
    <h1>Tambah Siswa Baru</h1>

    <form method="POST" action="{{ route('students.store') }}" 
          style="background:white; padding:30px; border-radius:10px; margin-top:20px; max-width:600px;">
        @csrf

        <div style="margin-bottom:20px;">
            <label style="display:block; font-weight:bold; margin-bottom:6px;">Nama Lengkap *</label>
            <input type="text" name="name" value="{{ old('name') }}" 
                   style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;"
                   placeholder="Masukkan nama lengkap">
            @error('name') <span style="color:red; font-size:13px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom:20px;">
            <label style="display:block; font-weight:bold; margin-bottom:6px;">Jenis Kelamin *</label>
            <select name="gender" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
                <option value="">-- Pilih --</option>
                <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('gender') <span style="color:red; font-size:13px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom:20px;">
            <label style="display:block; font-weight:bold; margin-bottom:6px;">No. HP</label>
            <input type="text" name="phone" value="{{ old('phone') }}" 
                   style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;"
                   placeholder="Opsional">
        </div>

        <div style="margin-bottom:20px;">
            <label style="display:block; font-weight:bold; margin-bottom:6px;">Nama Sekolah *</label>
            <input type="text" name="school" value="{{ old('school') }}" 
                   style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;"
                   placeholder="Contoh: SMK Negeri 1 Jakarta">
            @error('school') <span style="color:red; font-size:13px;">{{ $message }}</span> @enderror
        </div>

        <div style="display:flex; gap:10px;">
            <button type="submit" style="background:#1a1a2e; color:white; padding:12px 30px; border:none; border-radius:6px; cursor:pointer;">
                Simpan
            </button>
            <a href="{{ route('students.index') }}" style="padding:12px 20px; border:1px solid #ddd; border-radius:6px; text-decoration:none; color:#333;">
                Batal
            </a>
        </div>
    </form>
@endsection 