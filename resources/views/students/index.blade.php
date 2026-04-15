@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
<div class="table-container">

    <div class="table-header">
        <h1>Daftar Siswa Magang</h1>
        <a href="{{ route('students.create') }}" class="btn-primary">
            + Tambah Siswa
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">
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


@push('styles')
<style>

/* CONTAINER */
.table-container{
    padding: 20px;
}

/* HEADER */
.table-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.table-header h1{
    font-size: 24px;
    font-weight: 600;
    color:#111827;
}

/* BUTTON */
.btn-primary{
    background: linear-gradient(135deg,#4f46e5,#6366f1);
    color:white;
    padding:10px 16px;
    border-radius:8px;
    text-decoration:none;
    font-weight:500;
    transition:0.2s;
}

.btn-primary:hover{
    transform: translateY(-1px);
    opacity: 0.9;
}

/* SUCCESS */
.alert-success{
    background:#ecfdf5;
    color:#065f46;
    padding:12px;
    border-radius:8px;
    margin-bottom:20px;
    border-left:4px solid #10b981;
}

/* TABLE WRAPPER */
.table-wrapper{
    overflow-x:auto;
    background:white;
    border-radius:10px;
    box-shadow:0 4px 15px rgba(0,0,0,0.05);
}

/* TABLE */
.table-custom{
    width:100%;
    border-collapse:collapse;
    min-width:700px;
}

.table-custom th{
    background:#111827;
    color:white;
    padding:14px;
    font-size:13px;
    text-transform:uppercase;
}

.table-custom td{
    padding:14px;
    text-align:center;
    border-bottom:1px solid #f1f5f9;
}

/* ZEBRA */
.table-custom tbody tr:nth-child(even){
    background:#f9fafb;
}

.table-custom tbody tr:hover{
    background:#eef2ff;
}

/* TEXT */
.text-left{
    text-align:left;
    font-weight:500;
}

/* BADGE */
.badge{
    padding:5px 12px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
}

.badge.active{
    background:#dcfce7;
    color:#166534;
}

.badge.inactive{
    background:#fee2e2;
    color:#991b1b;
}

/* ACTION */
.action{
    display:flex;
    justify-content:center;
    gap:10px;
    align-items:center;
}

.link-edit{
    color:#4f46e5;
    text-decoration:none;
    font-weight:500;
}

.link-edit:hover{
    text-decoration:underline;
}

.btn-delete{
    background:none;
    border:none;
    color:#ef4444;
    cursor:pointer;
    font-weight:500;
}

.btn-delete:hover{
    text-decoration:underline;
}

/* EMPTY */
.empty{
    padding:30px;
    color:#9ca3af;
}

/* RESPONSIVE */
@media (max-width:768px){

    .table-header{
        flex-direction:column;
        align-items:flex-start;
        gap:10px;
    }

    .btn-primary{
        width:100%;
        text-align:center;
    }

    .table-custom th,
    .table-custom td{
        padding:10px;
        font-size:12px;
    }
}

</style>
@endpush