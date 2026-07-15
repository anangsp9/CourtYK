@extends('layouts.admin')

@section('content')
<style>
    .bloom-lime {
        box-shadow: 0 0 20px rgba(202, 243, 0, 0.4);
    }
</style>

<div class="max-w-2xl mx-auto space-y-layer-gap">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="p-1.5 bg-primary-container/10 rounded-lg text-primary-fixed">
                <span class="material-symbols-outlined text-lg">add</span>
            </div>
            <div>
                <h4 class="font-title-md text-title-md text-primary">Tambah Court Baru</h4>
                <p class="text-on-surface-variant font-label-sm text-sm">Tambahkan lapangan baru ke venue</p>
            </div>
        </div>
        <a href="{{ route('admin.courts.index') }}"
           class="flex items-center gap-1.5 text-sm text-on-surface-variant hover:text-primary transition-colors">
            <span class="material-symbols-outlined text-sm">arrow_back</span>
            Back
        </a>
    </div>

    {{-- Form Card --}}
    <section class="glass-card rounded-lg p-6 lg:p-8">
        <form action="{{ route('admin.courts.store') }}" method="POST" class="space-y-6">
            @csrf
            @include('admin.courts._form')

            <div class="flex items-center gap-3 pt-2">
                <button class="bg-primary-fixed text-on-primary-fixed px-6 py-2.5 rounded-lg text-sm font-bold hover:scale-[1.02] active:scale-95 transition-all flex items-center gap-2 bloom-lime">
                    <span class="material-symbols-outlined text-sm">save</span>
                    Simpan Court
                </button>
                <a href="{{ route('admin.courts.index') }}"
                   class="px-6 py-2.5 rounded-lg text-sm border border-white/10 text-on-surface-variant hover:bg-white/5 transition-all">
                    Batal
                </a>
            </div>
        </form>
    </section>

</div>
@endsection