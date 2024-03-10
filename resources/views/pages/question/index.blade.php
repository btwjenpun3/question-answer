@extends('layouts.master')

@section('header')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                {{-- <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Halaman
                    </div>
                    <h2 class="page-title">
                        Pertanyaan
                    </h2>
                </div> --}}
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <a href="{{ route('home') }}" class="btn">
                                Kembali
                            </a>
                        </span>
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary d-sm-none btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @livewire('question', ['id' => $id])
@endsection
