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
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-wrapper">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>L/P</th>
                    <th>No. HP</th>
                    <th>Sekolah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($students as $i => $s)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td class="text-left">{{ $s->name }}</td>
                    <td>{{ $s->gender == 'L' ? 'L' : 'P' }}</td>
                    <td>{{ $s->phone ?? '-' }}</td>
                    <td>{{ $s->school }}</td>

                    <td>
                        <span class="badge {{ $s->active ? 'active' : 'inactive' }}">
                            {{ $s->active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>

                    <td>
                        <div class="action">
                            <a href="{{ route('students.edit', $s->id) }}" class="link-edit">Edit</a>

                            <form action="{{ route('students.destroy', $s->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus {{ $s->name }}?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty">Belum ada data siswa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
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