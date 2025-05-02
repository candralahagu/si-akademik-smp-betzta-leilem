@extends('layout/layout')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <style>
        .text-content {
            margin-bottom: 0px;
            font-size: 1.1rem;
        }
    </style>
@endpush

@section('content')
    @role('Guru|Wali Kelas|Admin|Super Admin|Siswa')
        <div class="container-fluid mt-3">
            <div class="card mb-3 border-0 shadow-sm" style="background-color:#f2f2f2;">
                <div class="card-body" style="background-color: #37B7C3; border-radius: 8px">
                    @role('Super Admin')
                    <h2 class="m-0 text-center" style="color: #EBF4F6">Selamat Datang di Dashboard Super {{ auth()->user()->name }}</h2>
                    @endrole
                    @role('Admin')
                    <h2 class="m-0 text-center" style="color: #EBF4F6">Selamat Datang di Dashboard {{ auth()->user()->name }}</h2>
                    @endrole
                    @role('Guru')
                    <h2 class="m-0 text-center" style="color: #EBF4F6">Selamat Datang di Dashboard {{ auth()->user()->name }}</h2>
                    @endrole
                    @role('Wali Kelas')
                    <h2 class="m-0 text-center" style="color: #EBF4F6">Selamat Datang di Dashboard {{ auth()->user()->name }}</h2>
                    @endrole
                    @role('Siswa')
                    <h2 class="m-0 text-center" style="color: #EBF4F6">Selamat Datang di Dashboard Siswa {{ auth()->user()->name }}</h2>
                    @endrole
                </div>
            </div>

            <div class="mb-4">
                <div class="row mb-4">
                    <!-- Main Dashboard -->
                    <div class="col-12 col-md-6 mb-4 mb-md-0">
                        <div class="card h-100">
                            <div class="card-body p-4 p-md-5">
                                <div class="row justify-content-center mb-4">
                                    <img class="rounded-circle mb-3 img-fluid" style="object-fit: cover; max-width: 200px; height: auto;" src="{{asset('style/assets/sekolah1.png')}}" alt="sekolah-bro">
                                    <h3 class="text-center" style="color: #1e1e1e; font-size: clamp(1.25rem, 3vw, 1.5rem); font-weight: 600;">SMP BETZATA LEILEM</h3>
                                </div>
                                <p class="card-text text-content" style="font-size: clamp(1rem, 2.5vw, 1.15rem);">Kurikulum: Kurikulum Merdeka</p>
                                <p class="card-text text-content" style="font-size: clamp(1rem, 2.5vw, 1.15rem);">Akreditasi: B</p>
                                <h5 class="card-title mt-4" style="font-size: clamp(1rem, 2.5vw, 1.15rem);">Semester Aktif</h5>
                                @foreach($semesterAktif as $semester)
                                    <p class="card-text text-content" style="font-size: clamp(1rem, 2.5vw, 1.15rem);">Tahun Ajaran: {{ $semester->semester }} | {{ $semester->tahun_ajaran }}</p>
                                @endforeach
                                <h5 class="card-title mt-3" style="font-size: clamp(1rem, 2.5vw, 1.15rem);">Kepala Sekolah</h5>
                                @foreach($kepalaSekolah as $kepala)
                                    <p class="card-text text-content">{{ $kepala->nama }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @role('Admin|Super Admin')
                        <div class="col-12 col-md-6">
                            <!-- Charts -->
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="card p-3">
                                        <h4 class="text-center" style="font-size: clamp(1.25rem, 3vw, 1.5rem);">Distribusi Tenaga Pendidik</h4>
                                        <canvas id="pendidikChart" style="max-height: 300px; width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endrole

                    @role('Guru|Wali Kelas')
                        <div class="col-12 col-md-6">
                            <div class="row g-3">
                                <div class="col-6 col-sm-4 col-lg-6">
                                    <div class="card h-100">
                                        <div class="card-body d-flex flex-column justify-content-between p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="card-title mb-3" style="font-size: clamp(0.9rem, 2vw, 1rem);">Total Mata<br>Pelajaran Diampu</h5>
                                                <i class="fa-solid fa-chalkboard-user fa-lg"></i>
                                            </div>
                                            <h5 class="card-text">{{ $totalMapel }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-lg-6">
                                    <div class="card h-100">
                                        <div class="card-body d-flex flex-column justify-content-between p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="card-title mb-3" style="font-size: clamp(0.9rem, 2vw, 1rem);">Total Rombongan<br>Belajar Diampu</h5>
                                                <i class="fa-solid fa-users fa-lg"></i>
                                            </div>
                                            <h5 class="card-text">{{ $totalRombel }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- Repeat for other cards similarly -->
                                <div class="col-6 col-sm-4 col-lg-6">
                                    <div class="card h-100">
                                        <div class="card-body d-flex flex-column justify-content-between p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="card-title mb-3" style="font-size: clamp(0.9rem, 2vw, 1rem);">Total Capaian<br>Pembelajaran</h5>
                                                <i class="fa-solid fa-bullseye fa-lg"></i>
                                            </div>
                                            <h5 class="card-text">{{ $totalCP }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add other cards (Tujuan Pembelajaran, Tugas, etc.) similarly -->
                                @role('Wali Kelas')
                                    <div class="col-6 col-sm-4 col-lg-6">
                                        <div class="card h-100">
                                            <div class="card-body d-flex flex-column justify-content-between p-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title mb-3" style="font-size: clamp(0.9rem, 2vw, 1rem);">Total Siswa Perwalian</h5>
                                                    <i class="fa-solid fa-hands-holding-child fa-lg"></i>
                                                </div>
                                                <h5 class="card-text">{{ $totalPerwalian }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endrole
                            </div>
                        </div>
                    @endrole

                    @role('Siswa')
                        <div class="col-12 col-md-6">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="card p-3">
                                        <h4 class="text-center" style="font-size: clamp(1.25rem, 3vw, 1.5rem);">Rekap Ketidakhadiran</h4>
                                        <canvas id="tenagaKependidikanChart" style="max-height: 300px; width: 100%;"></canvas>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-lg-6">
                                    <div class="card p-3 h-100">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-column justify-content-between">
                                                <p class="card-title mb-3" style="font-size: clamp(0.75rem, 1.5vw, 0.85rem);"><a class="stretched-link text-decoration-none text-dark" href="{{ route('siswapage.absensi') }}">Cek Presensi</a></p>
                                                <h5 class="card-text" style="font-size: clamp(0.9rem, 2vw, 1rem);">Ayo Jangan Terlambat</h5>
                                            </div>
                                            <i class="fa-solid fa-caret-right fa-lg"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add other student cards (Buku Nilai, Jadwal, etc.) similarly -->
                            </div>
                        </div>
                    @endrole
                </div>

                @role('Admin|Super Admin')
                    <div class="row g-3">
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column justify-content-between p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-3" style="font-size: clamp(0.9rem, 2vw, 1rem);">Total Pendidik</h5>
                                        <i class="fa-solid fa-chalkboard-user fa-lg"></i>
                                    </div>
                                    <h5 class="card-text">{{ $totalGuru }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column justify-content-between p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-3" style="font-size: clamp(0.9rem, 2vw, 1rem);">Total Admin</h5>
                                        <i class="fa-solid fa-user-pen fa-lg"></i>
                                    </div>
                                    <h5 class="card-text">{{ $totalOperator }}</h5>
                                </div>
                            </div>
                        </div>
                        <!-- Add other admin cards similarly -->
                        @role('Admin')
                            <div class="col-6 col-sm-4 col-md-3">
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column justify-content-between p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title mb-3" style="font-size: clamp(0.9rem, 2vw, 1rem);">Total Kelas</h5>
                                            <i class="fa-solid fa-door-open fa-lg"></i>
                                        </div>
                                        <h5 class="card-text">{{ $totalKelas }}</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- Add other admin-specific cards -->
                        @endrole
                    </div>
                @endrole
            </div>

            <style>
            /* Custom responsive styles */
            .img-fluid {
                width: 100%;
                max-width: 200px;
                height: auto;
            }

            .card {
                transition: all 0.3s ease;
            }

            .canvas-container {
                position: relative;
                width: 100%;
                height: auto;
            }

            @media (max-width: 768px) {
                .card-body {
                    padding: 1rem !important;
                }

                .fa-2xl, .fa-lg {
                    font-size: 1.25rem !important;
                }

                .card-title, .card-text {
                    font-size: clamp(0.85rem, 2.5vw, 1rem) !important;
                }

                canvas {
                    max-height: 200px !important;
                }
            }

            @media (max-width: 576px) {
                .img-fluid {
                    max-width: 150px;
                }

                h3.text-center {
                    font-size: 1.25rem !important;
                }

                .row.g-3 {
                    gap: 1rem !important;
                }
            }
            </style>
        </div>
    @endrole
@endsection
@push('script')
    {{-- chartjs cdn --}}
    @role('Admin|Super Admin')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.5/dist/chart.umd.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get data from Laravel
                let tenagaKependidikanData = @json($tenagaKependidikanChartData);
                let pendidikData = @json($pendidikChartData);
                console.log(typeof tenagaKependidikanData);

                // Extract labels and values for tenaga kependidikan
                let tenagaLabels = ["Tenaga Kebersihan", "Tenaga Keamanan", "Tata Usaha"];
                let tenagaValues = [
                    tenagaKependidikanData.tenaga_kebersihan,
                    tenagaKependidikanData.tenaga_keamanan,
                    tenagaKependidikanData.tata_usaha
                ];

                // Extract labels and values for pendidik
                let pendidikLabels = ["PNS", "PPPK", "PTT", "GTT"];
                let pendidikValues = [
                    pendidikData.pns,
                    pendidikData.pppk,
                    pendidikData.ptt,
                    pendidikData.gtt
                ];

                // Create Tenaga Kependidikan Chart
                new Chart(document.getElementById("tenagaKependidikanChart"), {
                    type: 'bar',
                    data: {
                        labels: tenagaLabels,
                        datasets: [{
                            label: 'Jumlah',
                            data: tenagaValues,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(255, 159, 64, 0.6)',
                                'rgba(255, 205, 86, 0.6)'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1, // Pastikan hanya menampilkan angka bulat
                                    precision: 0, // Hindari angka desimal
                                }
                            }
                        }
                    }
                });

                // Create Pendidik Chart
                new Chart(document.getElementById("pendidikChart"), {
                    type: 'bar',
                    data: {
                        labels: pendidikLabels,
                        datasets: [{
                            label: 'Jumlah',
                            data: pendidikValues,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(153, 102, 255, 0.6)',
                                'rgba(201, 203, 207, 0.6)'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1, // Pastikan hanya menampilkan angka bulat
                                    precision: 0, // Hindari angka desimal
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endrole
    @role('Siswa')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.5/dist/chart.umd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        // Declare chart variable
        let chart = null;

        // Function to draw chart
        function drawChart(ketidakhadiranData = null) {
            // Extract labels and values for ketidakhadiran
            let ketidakhadiranLabels = ["Sakit", "Izin", "Alpa", "Terlambat"];
            let ketidakhadiranValues = [
                ketidakhadiranData.sakit,
                ketidakhadiranData.izin,
                ketidakhadiranData.alpa,
                ketidakhadiranData.terlambat,
            ];

            // Create Ketidakhadiran Chart
            if (chart) {
                chart.destroy();
            }
            chart = new Chart(document.getElementById("tenagaKependidikanChart"), {
                type: 'bar',
                data: {
                    labels: ketidakhadiranLabels,
                    datasets: [{
                        label: 'Jumlah',
                        data: ketidakhadiranValues,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(255, 205, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1, // Pastikan hanya menampilkan angka bulat
                                precision: 0, // Hindari angka desimal
                            }
                        }
                    }
                }
            });
        }
        document.addEventListener('DOMContentLoaded', function() {

            // Get data from Laravel via ajax
            $.ajax({
                url: "{{ route('fetchKehadiranSemester') }}",
                type: "GET",
                success: function(response) {
                    console.log(response.message);
                    // console.log(session)
                    drawChart(response.data);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });


        })
    </script>
    @endrole
@endpush
