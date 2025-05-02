@extends('layout.layout')

@push('style')
    <style>
        p {
            margin-bottom: 0.5rem;
        }

        /* Profile info layout using CSS Grid */
        .profile-info {
            display: grid;
            grid-template-columns: minmax(120px, 1fr) 2fr;
            gap: 0.5rem;
            align-items: baseline;
        }

        .profile-info strong {
            font-weight: 600;
            word-break: break-word;
        }

        .profile-info span, .profile-info input, .profile-info button {
            word-break: break-word;
        }

        /* Image upload container */
        .image-upload-container {
            position: relative;
            display: inline-block;
            width: 100%;
            max-width: 180px;
        }

        .image-hover {
            width: 100%;
            max-width: 180px;
            height: auto;
            object-fit: cover;
            object-position: center top;
            transition: opacity 0.3s;
            border-radius: 5px;
        }

        .upload-form {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
            background: rgba(0, 0, 0, 0.5);
        }

        .upload-input {
            display: none;
        }

        .upload-button {
            padding: 0.5rem 1rem;
            background-color: #37B7C3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: clamp(0.8rem, 2vw, 0.9rem);
            margin: 0.25rem 0;
        }

        .upload-button:hover {
            background-color: #2a9ca8;
        }

        .image-upload-container:hover .upload-form {
            opacity: 1;
            pointer-events: all;
        }

        /* Password form */
        .password-form {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            align-items: center;
        }

        .password-form input {
            height: 30px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 0.5rem;
            font-size: clamp(0.8rem, 2vw, 0.9rem);
            width: 100%;
            max-width: 250px;
        }

        .password-form button {
            height: 30px;
            background-color: #37B7C3;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 0 1rem;
            font-size: clamp(0.8rem, 2vw, 0.9rem);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .profile-info {
                grid-template-columns: 1fr;
                gap: 0.25rem;
            }

            .profile-info strong {
                margin-bottom: 0;
            }

            .image-upload-container {
                max-width: 150px;
            }

            .image-hover {
                max-width: 150px;
            }

            .upload-button {
                padding: 0.4rem 0.8rem;
                font-size: 0.85rem;
            }

            .password-form {
                flex-direction: column;
                align-items: flex-start;
            }

            .password-form input {
                max-width: 100%;
            }
        }

        @media (max-width: 576px) {
            .container {
                margin: 10px !important;
                padding: 0 10px;
            }

            .image-upload-container {
                max-width: 120px;
            }

            .image-hover {
                max-width: 120px;
            }

            .upload-button {
                font-size: 0.8rem;
                padding: 0.3rem 0.6rem;
            }

            .profile-info {
                font-size: 0.9rem;
            }

            h4 {
                font-size: 1rem;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container" style="margin: 20px">
        <div class="row">
            <div class="col-12 col-md-2 mb-3 mb-md-0">
                <div class="image-upload-container">
                    @if (auth()->user()->picture)
                        <img src="data:image/jpeg;base64,{{ base64_encode(auth()->user()->picture) }}" class="image-hover" alt="Profile Picture">
                    @else
                        <img src="{{ asset('style/assets/default_picture.jpg') }}" class="image-hover" alt="Default Profile Picture">
                    @endif
                    <form action="{{ route('update_picture') }}" method="POST" enctype="multipart/form-data" class="upload-form">
                        @csrf
                        <input type="file" name="image" accept="image/png, image/jpeg" id="imageInput" class="upload-input" />
                        <button type="button" class="upload-button" id="chooseButton">Pilih Gambar</button>
                        <button type="submit" class="upload-button" id="uploadButton" style="display:none;">Unggah Gambar</button>
                    </form>
                </div>
                <div class="text-center mt-3">
                    @role('Super Admin')
                        <h4>Super Admin</h4>
                    @endrole
                    @role('Guru')
                        <h4>Guru</h4>
                    @endrole
                    @role('Wali Kelas')
                        <h4>Wali Kelas</h4>
                    @endrole
                    @role('Admin')
                        <h4>Tenaga Kependidikan</h4>
                    @endrole
                    @role('Siswa')
                        <h4>Peserta Didik</h4>
                    @endrole
                </div>
            </div>
            <div class="col-12 col-md-10">
                <div class="profile-info">
                    <strong>Nama Pengguna</strong>
                    <span>{{ auth()->user()->username }}</span>

                    <strong>Email</strong>
                    <span>{{ auth()->user()->email }}</span>

                    <strong>Kata Sandi</strong>
                    <div class="password-form">
                        <form action="{{ route('update_password') }}" method="POST">
                            @csrf
                            <input type="password" name="new_password" required placeholder="Masukkan kata sandi baru" minlength="6" />
                            <button type="submit">Ubah</button>
                        </form>
                    </div>

                    <strong>Nama</strong>
                    <span>{{ auth()->user()->name }}</span>

                    @if (isset($data->gelar) && !empty($data->gelar))
                        <strong>Nama dan Gelar</strong>
                        <span>{{ trim($data->gelar_depan . " " . $data->nama . " " . $data->gelar_belakang) }}</span>
                    @endif

                    @role('Super Admin|Admin|Guru|Wali Kelas')
                        <strong>NIP / Kode Pegawai</strong>
                        <span>{{ $data->nip ?? '-' }}</span>

                        <strong>Jabatan</strong>
                        <span>{{ $data->jabatan ?? '-' }}</span>

                        <strong>Status</strong>
                        <span>{{ $data->status ?? '-' }}</span>

                        <strong>Pangkat Golongan</strong>
                        <span>{{ $data->pangkat_golongan ?? '-' }}</span>

                        <strong>Pendidikan</strong>
                        <span>{{ $data->pendidikan ?? '-' }}</span>

                        <strong>Tempat Lahir</strong>
                        <span>{{ $data->tempat_lahir ?? '-' }}</span>

                        <strong>Tanggal Lahir</strong>
                        <span>{{ $data->tanggal_lahir ?? '-' }}</span>

                        <strong>Jenis Kelamin</strong>
                        <span>{{ $data->jenis_kelamin ?? '-' }}</span>

                        <strong>Agama</strong>
                        <span>{{ $data->agama ?? '-' }}</span>

                        <strong>Alamat</strong>
                        <span>{{ $data->alamat ?? '-' }}</span>
                    @endrole

                    @role('Siswa')
                        <strong>NISN</strong>
                        <span>{{ $data->nisn ?? '-' }}</span>

                        <strong>Tempat Lahir</strong>
                        <span>{{ $data->tempat_lahir ?? '-' }}</span>

                        <strong>Tanggal Lahir</strong>
                        <span>{{ $data->tanggal_lahir ?? '-' }}</span>

                        <strong>Jenis Kelamin</strong>
                        <span>{{ $data->jenis_kelamin ?? '-' }}</span>

                        <strong>Agama</strong>
                        <span>{{ $data->agama ?? '-' }}</span>

                        <strong>Status Keluarga</strong>
                        <span>{{ $data->status_keluarga ?? '-' }}</span>

                        <strong>Anak Ke</strong>
                        <span>{{ $data->anak_ke ?? '-' }}</span>

                        <strong>Alamat</strong>
                        <span>{{ $data->alamat ?? '-' }}</span>

                        <strong>Telepon</strong>
                        <span>{{ $data->telepon ?? '-' }}</span>

                        <strong>Asal Sekolah</strong>
                        <span>{{ $data->asal_sekolah ?? '-' }}</span>

                        <strong>Tanggal Diterima</strong>
                        <span>{{ $data->tanggal_diterima ?? '-' }}</span>

                        <strong>Jalur Penerimaan</strong>
                        <span>{{ $data->jalur_penerimaan ?? '-' }}</span>

                        <strong>Nama Ayah</strong>
                        <span>{{ $data->nama_ayah ?? '-' }}</span>

                        <strong>Pekerjaan Ayah</strong>
                        <span>{{ $data->pekerjaan_ayah ?? '-' }}</span>

                        <strong>Nama Ibu</strong>
                        <span>{{ $data->nama_ibu ?? '-' }}</span>

                        <strong>Pekerjaan Ibu</strong>
                        <span>{{ $data->pekerjaan_ibu ?? '-' }}</span>

                        <strong>Nama Wali</strong>
                        <span>{{ $data->nama_wali ?? '-' }}</span>

                        <strong>Pekerjaan Wali</strong>
                        <span>{{ $data->pekerjaan_wali ?? '-' }}</span>

                        <strong>Angkatan</strong>
                        <span>{{ $data->angkatan ?? '-' }}</span>
                    @endrole
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Handle image selection and upload button toggle
        document.getElementById('chooseButton').addEventListener('click', function() {
            document.getElementById('imageInput').click();
        });

        document.getElementById('imageInput').addEventListener('change', function() {
            var file = this.files[0];
            if (file && (file.type === 'image/png' || file.type === 'image/jpeg')) {
                document.getElementById('chooseButton').style.display = 'none';
                document.getElementById('uploadButton').style.display = 'inline-block';
            } else {
                alert('File harus berformat PNG atau JPEG');
                document.getElementById('imageInput').value = '';
            }
        });
    </script>
@endpush
