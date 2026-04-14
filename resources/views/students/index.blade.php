@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h1>Daftar Siswa Magang</h1>
        <a href="{{ route('students.create') }}" 
           style="background:#1a1a2e; color:white; padding:10px 20px; border-radius:6px; text-decoration:none;">
            + Tambah Siswa
        </a>
    </div>

    @if(session('success'))
        <div style="background:#d4edda; color:#155724; padding:12px; border-radius:6px; margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width:100%; border-collapse:collapse; background:white;">
        <thead>
            <tr style="background:#1a1a2e; color:white;">
                <th style="padding:12px;">No</th>
                <th style="padding:12px;">Nama</th>
                <th style="padding:12px;">L/P</th>
                <th style="padding:12px;">No. HP</th>
                <th style="padding:12px;">Sekolah</th>
                <th style="padding:12px;">Status</th>
                <th style="padding:12px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $i => $s)
            <tr style="border-bottom:1px solid #eee; text-align:center;">
                <td style="padding:12px;">{{ $i + 1 }}</td>
                <td style="padding:12px; text-align:left;">{{ $s->name }}</td>
                <td style="padding:12px;">{{ $s->gender == 'L' ? '👦 Laki-laki' : '👧 Perempuan' }}</td>
                <td style="padding:12px;">{{ $s->phone ?? '-' }}</td>
                <td style="padding:12px;">{{ $s->school }}</td>
                <td style="padding:12px;">
                    <span style="background:{{ $s->active ? '#d4edda' : '#f8d7da' }}; 
                                 color:{{ $s->active ? '#155724' : '#721c24' }};
                                 padding:4px 10px; border-radius:20px; font-size:12px;">
                        {{ $s->active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td style="padding:12px;">
                    <a href="{{ route('students.edit', $s->id) }}" style="color:#0066cc;">Edit</a> |
                    <form action="{{ route('students.destroy', $s->id) }}" method="POST" style="display:inline;"
                          onsubmit="return confirm('Yakin ingin menghapus data {{ $s->name }}? Tindakan ini tidak bisa dibatalkan!');">
                        @csrf @method('DELETE')
                        <button type="submit" style="border:none; background:none; color:red; cursor:pointer;">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align:center; padding:30px; color:#999;">Belum ada data siswa.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection