@extends('admin.main')
@section('title', 'Surveyor')
@section('main-content')
    @include('admin.header')
    <!-- content -->
    <div class="content d-flex flex-column" id="surveyor-profile">
        <div class="surveyor-hl ms-5">
            <h1>Profil Surveyor</h1>
            <p class="mb-5">Dibawah ini adalah informasi lengkap <br> dari surveyor</p>

            <!-- avatar -->
            <div class="surveyor">
                @if ($profile_surveyor->avatar)
                <img src="{{ asset('storage/' . $profile_surveyor->avatar) }} " class="profile-img rounded-circle">
                @else
                <img src="/img/profile.png" class="profile-img rounded-circle">
                @endif
            </div>
            <div class="profile-status mt-3 d-flex flex-column">
                <h3>{{ ucwords($profile_surveyor->nama_lengkap) }}</h3>
                <p>{{ ucwords($profile_surveyor->role) }}</p>
            </div>
        </div>

        <div class="data-surveyor p-5">
            <!-- Riwayat -->
            <div class="riwayat d-flex justify-content-end mb-2" data-bs-toggle="modal" data-bs-target="#riwayatModal">
                Riwayat Survei
            </div>

            <!-- Modal -->
            <div class="modal fade mt-0" id="riwayatModal" tabindex="-1" aria-labelledby="riwayatModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="riwayatModalLabel">Riwayat Survei</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-tabel">
                                <table class="table" id="tabel-riwayat">
                                    <thead class="judul-tabel border-bottom-1">
                                        <tr>
                                            <th class="p-0" scope="col">Surveyor</th>
                                            <th class="p-0" scope="col">Kecamatan</th>
                                            <th class="p-0" scope="col">Jenis Target</th>
                                            <th class="p-0" scope="col">Tanggal Mulai</th>
                                            <th class="p-0" scope="col">Tanggal Selesai</th>
                                            <th class="p-0" scope="col">Hasil Target</th>
                                            <th class="p-0" scope="col">Perhitungan Target</th>
                                        </tr>
                                    </thead>
                                    <tbody class="isi-tabel">
                                        @foreach ($detailSurvey as $item)
                                            <tr>
                                                <td>{{ $profile_surveyor->nama_lengkap }}</td>
                                                <td>{{ $item->kecamatan->nama }}</td>
                                                <td>Per-Minggu</td>
                                                <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('j F Y') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('j F Y') }}
                                                </td>

                                                <td>{{ $item->selesai }} dari {{ $item->target }} Gang dan Perumahan
                                                </td>
                                                <td
                                                    class="{{ $item->selesai - $item->target < 0 ? 'text-danger' : 'text-success' }} fw-bold">
                                                    @if ($item->selesai - $item->target > 0)
                                                        + {{ $item->selesai - $item->target }} Gang dan Perumahan
                                                    @elseif ($item->selesai - $item->target == 0)
                                                        Survei Sukses
                                                    @elseif($item->selesai - $item->target < 0)
                                                        {{                                                         $item->selesai - $item->target }}
                                                        Gang dan Perumahan
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Riwayat -->

            <!--  Data Profil Surveyor -->
            <div class="biodata">

                <table class="bio">
                    <tr>
                        <td class="left-bio">Nama Lengkap</td>
                        <td class="right-bio">: {{ ucwords($profile_surveyor->nama_lengkap) }}</td>
                    </tr>
                    <tr>
                        <td class="left-bio">Wilayah Survei</td>
                        <td class="right-bio">: Kabupaten {{ ucwords($area->nama) }}</td>
                    </tr>
                    <tr>
                        <td class="left-bio">Email</td>
                        <td class="right-bio">: {{ $profile_surveyor->email }}</td>
                    </tr>
                    <tr>
                        <td class="left-bio">No. Handphone</td>
                        <td class="right-bio">: {{ $profile_surveyor->nomor_telepon }}</td>
                    </tr>
                    <tr class="w-100">
                        <td class="left-bio">Alamat</td>
                        <td class="right-bio text-wrap">:
                            {{ $profile_surveyor->alamat }}</td>
                    </tr>
                    <tr>
                        <td class="left-bio">Jenis Kelamin</td>
                        <td class="right-bio">: {{ ucwords($profile_surveyor->gender) }}</td>
                    </tr>
                    <tr>
                        <td class="left-bio">Tanggal Lahir</td>
                        <td class="right-bio">:
                            {{                             $profile_surveyor->tanggal_lahir === null ? $profile_surveyor->tanggal_lahir : \Carbon\Carbon::parse($profile_surveyor->tanggal_lahir)->format('j F, Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="left-bio">Target Mingguan</td>
                        <td class="right-bio">: {{ $weekly_selesai }} dari
                            {{ $weekly_target }} Gang dan Perumahan</td>
                    </tr>
                    <tr>
                        <td class="left-bio">Target Tercapai</td>
                        <td class="right-bio">: {{ $selesai }} dari
                            {{ $target }} Gang dan Perumahan </td>
                    </tr>
                    <tr id="tr-akhir">
                        <td class="left-bio">Perhitungan Target</td>
                        <td class="right-bio {{ $selesai - $target < 0 ? 'text-danger' : 'text-success' }} fw-bold">:
                            @if ($selesai - $target > 0)
                                + {{ $selesai - $target }} Gang dan Perumahan
                            @elseif ($selesai - $target == 0)
                                Survei Komplit
                            @elseif($selesai - $target < 0) {{ $selesai - $target }} Gang dan Perumahan
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Btn Ubah Password -->
        <div class="ubah-password d-flex justify-content-evenly mt-5">
            <a href="/surveyor/edit/profile/{{ $profile_surveyor->id }}" class="btn btn-primary ps-5 pe-5 mb-5 border-0" style="border-radius: .5em; background: #3f4fc8;">Edit
                Profile</a>
            <a href="/surveyor/edit/password/{{ $profile_surveyor->id }}" class="btn btn-primary ps-5 pe-5 mb-5 border-0" style="border-radius: .5em; background: #3f4fc8;">Edit
                Password</a>
        </div>
    </div>
@endsection
