<div>
    @php
        $time = new \App\Http\Controllers\TimeController();
    @endphp
    <div class="row g-4">
        <div class="col-md-3">
            <div class="form-label">
                Silahkan Filter untuk Membaca Kategori Pertanyaan dan Klik TERJAWAB untuk Melihat Jawaban
                <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="Pilih untuk mencari sesuai kategori pertanyaan" wire:ignore>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M12 17l0 .01" />
                        <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
                    </svg>
                </span>
            </div>
            <div class="mb-4">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" value="1" wire:model.change="filter"
                        wire:key="filter1">
                    <span class="form-check-label">Kebidanan & Kandungan</span>
                </label>
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" value="2" wire:model.change="filter"
                        wire:key="filter2">
                    <span class="form-check-label">Anak</span>
                </label>
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" value="3" wire:model.change="filter"
                        wire:key="filter3">
                    <span class="form-check-label">Umum</span>
                </label>
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" value="4" wire:model.change="filter"
                        wire:key="filter4">
                    <span class="form-check-label">Kecantikan</span>
                </label>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row row-cards">
                <div class="space-y">
                    @if ($questions->isEmpty())
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="list-inline list-inline-dots mb-0 text-muted d-sm-block">
                                            <div class="list-inline-item">
                                                Belum ada pertanyaan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        @foreach ($questions as $question)
                            @if ($question->status === 'active')
                                <div class="card" wire:key="{{ $question->id }}">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h3 class="mb-0"><a
                                                                href="{{ route('question', ['id' => $question->id]) }}">{{ $question->title }}</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <p>{{ Str::limit($question->question, 150, '...') }} </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md">
                                                        <div
                                                            class="list-inline list-inline-dots mb-0 text-muted d-sm-block">
                                                            <div class="list-inline-item">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-folder"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path
                                                                        d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" />
                                                                </svg>
                                                                {{ $question->category->name }}
                                                            </div>
                                                            <div class="list-inline-item">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-user-circle"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path
                                                                        d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                                    <path
                                                                        d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                                    <path
                                                                        d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                                                                </svg>
                                                                {{ $question->name }}
                                                            </div>
                                                            <div class="list-inline-item">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-clock-hour-4"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path
                                                                        d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                                    <path d="M12 12l3 2" />
                                                                    <path d="M12 7v5" />
                                                                </svg>
                                                                {{ $time->convert($question->created_at) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($question->answered == '0')
                                                <a href="{{ route('question', ['id' => $question->id]) }}">
                                                    <div class="ribbon bg-warning">
                                                        Aktif
                                                    </div>
                                                </a>
                                            @elseif ($question->answered == '1')
                                                <a href="{{ route('question', ['id' => $question->id]) }}">
                                                    <div class="ribbon bg-success">
                                                        Terjawab
                                                    </div>
                                                </a>
                                            @endif
                                            @can('admin')
                                                <div class="card-footer d-flex justify-content-end">
                                                    <button class="btn btn-outline-secondary me-1"
                                                        wire:click="archiveConfirm({{ $question->id }})"
                                                        data-bs-toggle="modal" data-bs-target="#archive">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-archive" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                                            <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                                                            <path d="M10 12l4 0" />
                                                        </svg>
                                                        Arsipkan
                                                    </button>
                                                    <button class="btn btn-outline-danger me-1"
                                                        wire:click="deleteConfirm({{ $question->id }})"
                                                        data-bs-toggle="modal" data-bs-target="#delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-trash" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 7l16 0" />
                                                            <path d="M10 11l0 6" />
                                                            <path d="M14 11l0 6" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </div>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            @elseif ($question->status === 'hold')
                                @can('admin')
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h3 class="mb-0"><a
                                                                    href="{{ route('question', ['id' => $question->id]) }}">{{ $question->title }}</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <p>{{ Str::limit($question->question, 150, '...') }} </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md">
                                                            <div
                                                                class="list-inline list-inline-dots mb-0 text-muted d-sm-block">
                                                                <div class="list-inline-item">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-folder"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" />
                                                                    </svg>
                                                                    {{ $question->category->name }}
                                                                </div>
                                                                <div class="list-inline-item">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-user-circle"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                                        <path
                                                                            d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                                        <path
                                                                            d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                                                                    </svg>
                                                                    {{ $question->name }}
                                                                </div>
                                                                <div class="list-inline-item">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-clock-hour-4"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                                        <path d="M12 12l3 2" />
                                                                        <path d="M12 7v5" />
                                                                    </svg>
                                                                    {{ $time->convert($question->created_at) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('question', ['id' => $question->id]) }}">
                                                    <div class="ribbon bg-secondary">
                                                        Hold
                                                    </div>
                                                </a>
                                                <div class="card-footer d-flex justify-content-end">
                                                    <button class="btn btn-outline-success me-1" data-bs-toggle="modal"
                                                        data-bs-target="#accept"
                                                        wire:click="acceptConfirm({{ $question->id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-square-rounded-check"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M9 12l2 2l4 -4" />
                                                            <path
                                                                d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                                        </svg>
                                                        Setujui
                                                    </button>
                                                    <button class="btn btn-outline-secondary me-1"
                                                        wire:click="archiveConfirm({{ $question->id }})"
                                                        data-bs-toggle="modal" data-bs-target="#archive">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-archive" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                                            <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                                                            <path d="M10 12l4 0" />
                                                        </svg>
                                                        Arsipkan
                                                    </button>
                                                    <button class="btn btn-outline-danger me-1"
                                                        wire:click="deleteConfirm({{ $question->id }})"
                                                        data-bs-toggle="modal" data-bs-target="#delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-trash" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 7l16 0" />
                                                            <path d="M10 11l0 6" />
                                                            <path d="M14 11l0 6" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                            @elseif ($question->status === 'archive')
                                @can('admin')
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h3 class="mb-0"><a
                                                                    href="{{ route('question', ['id' => $question->id]) }}">{{ $question->title }}</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <p>{{ Str::limit($question->question, 150, '...') }} </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md">
                                                            <div
                                                                class="list-inline list-inline-dots mb-0 text-muted d-sm-block">
                                                                <div class="list-inline-item">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-folder"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" />
                                                                    </svg>
                                                                    {{ $question->category->name }}
                                                                </div>
                                                                <div class="list-inline-item">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-user-circle"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                                        <path
                                                                            d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                                        <path
                                                                            d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                                                                    </svg>
                                                                    {{ $question->name }}
                                                                </div>
                                                                <div class="list-inline-item">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-clock-hour-4"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                                        <path d="M12 12l3 2" />
                                                                        <path d="M12 7v5" />
                                                                    </svg>
                                                                    {{ $time->convert($question->created_at) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('question', ['id' => $question->id]) }}">
                                                    <div class="ribbon bg-secondary">
                                                        Di Arsipkan
                                                    </div>
                                                </a>
                                                <div class="card-footer d-flex justify-content-end">
                                                    <button class="btn btn-outline-success me-1" data-bs-toggle="modal"
                                                        data-bs-target="#accept"
                                                        wire:click="acceptConfirm({{ $question->id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-square-rounded-check"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M9 12l2 2l4 -4" />
                                                            <path
                                                                d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                                        </svg>
                                                        Aktifkan
                                                    </button>
                                                    <button class="btn btn-outline-danger me-1"
                                                        wire:click="deleteConfirm({{ $question->id }})"
                                                        data-bs-toggle="modal" data-bs-target="#delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-trash" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 7l16 0" />
                                                            <path d="M10 11l0 6" />
                                                            <path d="M14 11l0 6" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-end" wire:ignore.self>
                {{ $questions->links() }}
            </div>
        </div>
    </div>

    {{-- Modal --}}

    <div class="modal modal-blur fade" id="create" tabindex="-1" role="dialog" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pertanyaan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="save">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label required">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    wire:model="nama">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <label class="form-label required">Kategori</label>
                                <select class="form-control @error('kategori') is-invalid @enderror"
                                    wire:model="kategori">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="1">Kebidanan & Kandungan</option>
                                    <option value="2">Anak</option>
                                    <option value="3">Umum</option>
                                    <option value="4">Kecantikan</option>
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <label class="form-label required">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    wire:model="judul">
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <label class="form-label required">Pertanyaan</label>
                                <textarea class="form-control @error('pertanyaan') is-invalid @enderror" data-bs-toggle="autosize"
                                    placeholder="Type something…"
                                    style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 60px;"
                                    wire:model="pertanyaan"></textarea>
                                @error('pertanyaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label">Gambar</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                    wire:model="gambar">
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div wire:ignore>
                                <div class="g-recaptcha mt-3 mb-3" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}">
                                </div>
                                @error('recaptchaToken')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" wire:loading.target="save"
                                wire:loading.attr="disabled"
                                wire:click="$set('recaptchaToken', grecaptcha.getResponse())">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @can('admin')
        {{-- Modal Accept --}}

        <div class="modal modal-blur fade" id="accept" tabindex="-1" role="dialog" aria-hidden="true"
            wire:ignore.self>
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-success"></div>
                    <div class="modal-body text-center py-4">
                        <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M9 12l2 2l4 -4" />
                        </svg>
                        <div class="text-muted">
                            Setelah di setujui maka pertanyaan dapat diliat oleh semua orang.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        Tutup
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success w-100" wire:click="accept"
                                        wire:loading.attr="disabled">
                                        Setujui
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Archive --}}

        <div class="modal modal-blur fade" id="archive" tabindex="-1" role="dialog" aria-hidden="true"
            wire:ignore.self>
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-secondary"></div>
                    <div class="modal-body text-center py-4">
                        <div class="text-muted">
                            Setelah di setujui maka pertanyaan masuk ke arsip dan hanya user yang bisa melihat.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        Tutup
                                    </a>
                                </div>
                                <div class="col">
                                    <button class="btn btn-secondary w-100" wire:click="archive"
                                        wire:loading.attr="disabled">
                                        Arsipkan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Delete --}}

        <div class="modal modal-blur fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true"
            wire:ignore.self>
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <div class="modal-body text-center py-4">
                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                            <path d="M12 9v4" />
                            <path d="M12 17h.01" />
                        </svg>
                        <h3>Hapus?</h3>
                        <div class="text-muted">Data yang sudah terhapus tidak dapat dikembalikan!
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        Cancel
                                    </a>
                                </div>
                                <div class="col">
                                    <button class="btn btn-danger w-100" wire:click="delete"
                                        wire:loading.attr="disabled">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @script
        <script>
            $wire.on('success', (data) => {
                toastr.success(data);
            });
            $wire.on('error', (data) => {
                toastr.error(data);
            });
            $wire.on('modal-create-close', function() {
                $('#create').modal('hide');
            });
            $wire.on('modal-accept-close', function() {
                $('#accept').modal('hide');
            });
            $wire.on('modal-archive-close', function() {
                $('#archive').modal('hide');
            });
            $wire.on('modal-delete-close', function() {
                $('#delete').modal('hide');
            });
        </script>
    @endscript
</div>
