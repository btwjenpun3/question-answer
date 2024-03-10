<div>
    <div class="row row-cards justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $question->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="question">
                        <h3>{{ $question->title }}</h3>
                        <p>{{ $question->question }}</p>
                    </div>
                    @switch($question->image)
                        @case(true)
                            <div class="image">
                                <img src="{{ asset(Storage::url($question->image)) }}" style="width:500px">
                            </div>
                        @break

                        @case(false)
                        @break

                        @default
                    @endswitch
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <div class="list-inline list-inline-dots mb-0 text-muted d-sm-block">
                        <div class="list-inline-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-folder"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" />
                            </svg>
                            {{ $question->category->name }}
                        </div>
                    </div>
                    <div class="list-inline list-inline-dots mb-0 text-muted d-sm-block">
                        <span class="card-subtitle ms-auto">{{ $question->created_at }} WIB</span>
                    </div>
                </div>
                @if ($question->status === 'hold')
                    <div class="ribbon bg-secondary">
                        Hold
                    </div>
                @elseif ($question->status === 'active' && $question->answered === 1)
                    <div class="ribbon bg-success">
                        Terjawab
                    </div>
                @elseif ($question->status === 'active' && $question->answered === 0)
                    <div class="ribbon bg-warning">
                        Aktif
                    </div>
                @elseif ($question->status === 'archive')
                    <div class="ribbon bg-secondary">
                        Di Arsipkan
                    </div>
                @endif
                @can('admin')
                    <div class="card-footer d-flex justify-content-end">
                        @switch($question->status)
                            @case('active')
                                <button class="btn btn-outline-secondary me-1" wire:click="archiveConfirm({{ $question->id }})"
                                    data-bs-toggle="modal" data-bs-target="#archive">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                        <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                                        <path d="M10 12l4 0" />
                                    </svg>
                                    Arsipkan
                                </button>
                                <button class="btn btn-outline-danger me-1" wire:click="deleteConfirm({{ $question->id }})"
                                    data-bs-toggle="modal" data-bs-target="#delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7l16 0" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 11l0 6" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                    Hapus
                                </button>
                            @break

                            @case('hold')
                                <button class="btn btn-outline-success me-1" data-bs-toggle="modal" data-bs-target="#accept"
                                    wire:click="acceptConfirm({{ $question->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-square-rounded-check" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 12l2 2l4 -4" />
                                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                    </svg>
                                    Setujui
                                </button>
                                <button class="btn btn-outline-secondary me-1" wire:click="archiveConfirm({{ $question->id }})"
                                    data-bs-toggle="modal" data-bs-target="#archive">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                        <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                                        <path d="M10 12l4 0" />
                                    </svg>
                                    Arsipkan
                                </button>
                                <button class="btn btn-outline-danger me-1" wire:click="deleteConfirm({{ $question->id }})"
                                    data-bs-toggle="modal" data-bs-target="#delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7l16 0" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 11l0 6" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                    Hapus
                                </button>
                            @break

                            @case('archive')
                                <button class="btn btn-outline-success me-1" data-bs-toggle="modal" data-bs-target="#accept"
                                    wire:click="acceptConfirm({{ $question->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-square-rounded-check" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 12l2 2l4 -4" />
                                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                    </svg>
                                    Aktifkan
                                </button>
                                <button class="btn btn-outline-danger me-1" wire:click="deleteConfirm({{ $question->id }})"
                                    data-bs-toggle="modal" data-bs-target="#delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7l16 0" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 11l0 6" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                    Hapus
                                </button>
                            @break

                            @default
                        @endswitch
                    </div>
                @endcan
            </div>
            @if (isset($answer))
                <div class="mt-3">
                    <div class="card bg-success-lt mt-2">
                        <div class="card-body">
                            <h3 class="card-title">Jawaban</h3>
                            <p class="text-secondary">
                                {!! html_entity_decode($answer->answer) !!}
                            </p>
                            <div class="d-flex justify-content-start">
                                <span class="avatar"
                                    style="background-image: url({{ asset(Storage::url($answer->doctor->photo)) }})"></span>
                                <p class="text-secondary ms-3 pt-2">
                                    Di jawab oleh : <b>{{ $answer->doctor->name }}</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            @endif
            @can('admin')
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="question" wire:ignore>
                            <textarea id="answer" class="form-control @error('jawaban') is-invalid @enderror" wire:model="jawaban"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mr-auto">
                            @switch($question->answered)
                                @case(0)
                                    <button class="btn btn-success" wire:click="save" wire:loading.attr="disabled">Jawab</button>
                                @break

                                @case(1)
                                    <button class="btn btn-primary" wire:click="update({{ $answer->id }})"
                                        wire:loading.attr="disabled">Edit</button>
                                @break

                                @default
                            @endswitch
                        </div>
                    </div>
                </div>
            @endcan
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
                                    <button class="btn btn-success w-100" wire:click="accept"
                                        wire:loading.attr="disabled">
                                        Setujui
                                    </button>
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

    @can('admin')
        @script
            <script>
                $wire.on('success', function(data) {
                    toastr.success(data);
                });
                $wire.on('error', function(data) {
                    toastr.error(data);
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
                tinymce.init({
                    selector: 'textarea#answer',
                    plugins: 'code table lists',
                    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
                    setup: function(editor) {
                        editor.on('init change', function() {
                            editor.save();
                        });
                        editor.on('change', function(e) {
                            @this.set('jawaban', editor.getContent());
                        });
                    }
                });
            </script>
        @endscript
    @endcan
</div>
