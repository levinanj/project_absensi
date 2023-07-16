@extends('Manage.layouts.app')
@section('content')
    <!-- Main content -->
    <div class="main-content" id="panel">
    @include('Manage.includes.header')
    <!-- Header -->
        <!-- Header -->
        <div class="header bg-success pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">{{ $pageTitle }}</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark radius">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                                class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Siswa</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $student->name }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">Kehadiran</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center bg-gray-100 radius shadow-2xl">
                            <img src="{{ asset(Config::get('settings.site_logo')) }}" onerror="this.onerror=null;this.src='https://picsum.photos/200';"
                                 class="rounded-circle img-center img-fluid shadow shadow-lg--hover"
                                 style="width: 140px;" alt="">
                            <h1 class="mt-4">{{ $student->name }}</h1>
                            <blockquote class="blockquote mb-0">
                                <p class="mb-0">{{ $student->email }}</p>
                                <p class="mb-0 text-bold"><a href="tel:{{ $student->phone }}">{{ $student->phone }}</a> </p>

                            </blockquote>
                        </div>
                    </div>
                </div>
                <!-- Stats -->
                <div class="col-md-6">
                    <div class="card bg-gradient-default radius shadow-2xl">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Total Mata Pelajaran yang Diikuti</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $student->subjects->count() }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-red text-white rounded-circle shadow">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-gradient-default radius shadow-2xl">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-white mb-0">Total Presen</h5>
                                            <span class="h2 font-weight-bold text-white mb-0">{{ $student->present_count() }}</span>
                                        </div>
                                        
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-red text-white rounded-circle shadow">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <a style="color: rgb(167, 167, 179); text-decoration: underline" href="{{ route('student.presence', $student,) }}">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-gradient-default radius shadow-2xl">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-white mb-0">Total Absen</h5>
                                            <span class="h2 font-weight-bold text-white mb-0">{{ $student->absent_count() }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-red text-white rounded-circle shadow">
                                                <i class="fas fa-calendar-minus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <a style="color: rgb(167, 167, 179); text-decoration: underline" href="{{ route('student.absence', $student,) }}">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subjects -->
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12">
                    <!-- Table -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Kehadiran</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush datatable-buttons">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="number">#</th>
                                    <th scope="col" class="sort" data-sort="subject">Mata Pelajaran</th>
                                    <th scope="col" class="sort" data-sort="action">Tanggal</th>
                                </tr>
                                </thead>
                                <tbody class="list">

                                    {{-- @php
                                        dd($student->present())
                                    @endphp --}}
                                @foreach ($student->present() as $subject)
                                    <tr>
                                        <td class="text-capitalize">
                                            <span class="badge badge-primary text-lg rounded-circle">
                                                {{ $loop->iteration }}
                                            </span>
                                        </td>
                                        <td class="text-capitalize">
                                            {{ $student->getSubject($subject->subject_id)[0]->name }}
                                        </td>
                                        <td>
                                            {{ $subject->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Table -->
                </div>
            </div>
        </div>
        <!--/ Subjects -->
    </div>
@endsection
