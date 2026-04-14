@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
    <h1>Edit Data Siswa</h1>
    <p style="color:#999; margin-bottom:20px;">ID: {{ $student->id }} | Dibuat: {{ $student->created_at->format('d M Y') }}</p>

    <form method="POST" action="{{ route('students.update', $student->id) }}"
          style="background:white; padding:30px; border-radius:10px; max-width:600px;">
        @csrf
        @method('PUT')

        <div style="margin-bottom:20px;">
            <label style="display:block; font-weight:bold; margin-bottom:6px;">Nama Lengkap *</label>
            <input type="text" name="name" value="{{ old('name', $student->name) }}"
                   style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
            @error('name') <span style="color:red; font-size:13px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom:20px;">
            <label style="display:block; font-weight:bold; margin-bottom:6px;">Jenis Kelamin *</label>
            <select name="gender" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
                <option value="L" {{ old('gender', $student->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('gender', $student->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('gender') <span style="color:red; font-size:13px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom:20px;">
            <label style="display:block; font-weight:bold; margin-bottom:6px;">No. HP</label>
            <input type="text" name="phone" value="{{ old('phone', $student->phone) }}"
                   style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
        </div>

        <div style="margin-bottom:20px;">
            <label style="display:block; font-weight:bold; margin-bottom:6px;">Nama Sekolah *</label>
            <input type="text" name="school" value="{{ old('school', $student->school) }}"
                   style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
            @error('school') <span style="color:red; font-size:13px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom:20px;">
            <label style="display:block; font-weight:bold; margin-bottom:6px;">Status</label>
            <select name="active" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
                <option value="1" {{ old('active', $student->active) == 1 ? 'selected' : '' }}>✅ Aktif</option>
                <option value="0" {{ old('active', $student->active) == 0 ? 'selected' : '' }}>❌ Nonaktif</option>
            </select>
        </div>

        <div style="display:flex; gap:10px;">
            <button type="submit" style="background:#1a1a2e; color:white; padding:12px 30px; border:none; border-radius:6px; cursor:pointer;">
                Update
            </button>
            <a href="{{ route('students.index') }}" style="padding:12px 20px; border:1px solid #ddd; border-radius:6px; text-decoration:none; color:#333;">
                Batal
            </a>
        </div>
    </form>
@endsection