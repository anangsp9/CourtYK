@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
        <div>
            <h2 class="font-headline-lg text-headline-lg text-primary tracking-tight">Payment Management</h2>
            <p class="text-on-surface-variant text-sm mt-1">Review and verify bank transfer proofs for court bookings.</p>
        </div>
        <div class="flex items-center gap-2">
            <button class="glass-card px-4 py-2 rounded-lg bg-surface-container/30 text-sm flex items-center gap-2 hover:bg-white/5 transition-all text-on-surface-variant">
                <span class="material-symbols-outlined text-sm">filter_list</span>
                Filter
            </button>
            <button class="glass-card px-4 py-2 rounded-lg bg-surface-container/30 text-sm flex items-center gap-2 hover:bg-white/5 transition-all text-on-surface-variant">
                <span class="material-symbols-outlined text-sm">download</span>
                Export CSV
            </button>
        </div>
    </div>

    {{-- Payment Records --}}
    <div class="grid grid-cols-1 gap-5">
        @forelse($payments as $payment)
            <div class="glass-card bg-surface-container-low/40 p-5 rounded-xl flex flex-col sm:flex-row items-start gap-5 border border-white/[0.06] shadow-[0_20px_40px_rgba(0,0,0,0.4)] transition-all duration-300 hover:scale-[1.01] hover:-translate-y-0.5">
                {{-- Proof Image --}}
                <div class="shrink-0 w-full sm:w-24 h-32 relative group overflow-hidden rounded-lg border border-white/10 bg-surface-container">
                    <img src="{{ asset('storage/' . $payment->proof_image) }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        alt="Payment Proof">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity cursor-pointer"
                         onclick="document.getElementById('modal-{{ $payment->id }}').classList.remove('hidden')">
                        <span class="material-symbols-outlined text-white">zoom_in</span>
                    </div>
                </div>

                {{-- Info --}}
                <div class="flex-1 grid grid-cols-1 sm:grid-cols-4 gap-4 items-center w-full">
                    <div>
                        <span class="text-[11px] font-bold text-primary-fixed uppercase tracking-wider block mb-1">#{{ $payment->booking_id }}</span>
                        <h3 class="font-bold text-on-surface text-base">{{ $payment->booking->user->name }}</h3>
                    </div>
                    <div>
                        <p class="text-[10px] text-on-surface-variant/50 uppercase tracking-wider mb-1">Venue / Court</p>
                        <p class="text-sm text-on-surface">{{ $payment->booking->court->venue->name }} / <span class="text-primary-fixed">{{ $payment->booking->court->name }}</span></p>
                    </div>
                    <div>
                        <p class="text-[10px] text-on-surface-variant/50 uppercase tracking-wider mb-1">Status</p>
                        @php
                            $statusStyles = [
                                'pending' => 'bg-amber-500/10 text-amber-400 border-amber-400/20',
                                'approved' => 'bg-primary-fixed/10 text-primary-fixed border-primary-fixed/20',
                                'rejected' => 'bg-red-500/10 text-red-400 border-red-500/20',
                            ];
                            $statusDots = [
                                'pending' => 'bg-amber-400 animate-pulse',
                                'approved' => 'bg-primary-fixed',
                                'rejected' => 'bg-red-500',
                            ];
                        @endphp
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold border {{ $statusStyles[$payment->status] ?? 'bg-white/5 text-on-surface-variant' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $statusDots[$payment->status] ?? 'bg-on-surface-variant' }}"></span>
                            {{ ucfirst($payment->status) }}
                        </span>
                    </div>
                    <div class="flex justify-end gap-2">
                        @if($payment->status === 'pending')
                            <form action="{{ route('admin.payments.approve', $payment) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="px-4 py-2 rounded-lg bg-primary-fixed text-on-primary font-bold text-sm bloom-lime hover:opacity-90 transition-all">
                                    Approve
                                </button>
                            </form>
                            <form action="{{ route('admin.payments.reject', $payment) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="px-4 py-2 rounded-lg bg-red-500/10 border border-red-500/30 text-red-400 font-bold text-sm hover:bg-red-500/20 transition-all">
                                    Reject
                                </button>
                            </form>
                        @else
                            <span class="text-on-surface-variant/40 text-xs italic">
                                {{ $payment->status === 'approved' ? 'Processed' : 'Invalid Receipt' }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Image Modal --}}
            <div id="modal-{{ $payment->id }}"
                class="fixed inset-0 bg-black/90 backdrop-blur-3xl z-[100] hidden flex-col items-center justify-center p-6 cursor-zoom-out"
                onclick="event.target.id === 'modal-{{ $payment->id }}' && this.classList.add('hidden')">
                <div class="flex justify-end w-full max-w-2xl mb-2">
                    <button onclick="document.getElementById('modal-{{ $payment->id }}').classList.add('hidden')"
                        class="text-on-surface flex items-center gap-1 text-sm font-bold hover:text-primary-fixed transition-colors py-1 px-2 rounded-lg hover:bg-white/5">
                        <span class="material-symbols-outlined text-lg">close</span>
                        Close Preview
                    </button>
                </div>
                <div class="relative max-w-2xl w-full">
                    <img src="{{ asset('storage/' . $payment->proof_image) }}"
                        class="w-full h-auto rounded-xl border border-white/20 shadow-2xl"
                        alt="Payment Proof Enlarged">
                </div>
            </div>
        @empty
            <div class="glass-card bg-surface-container-low/40 p-12 rounded-xl text-center border border-white/[0.06]">
                <div class="flex flex-col items-center gap-3">
                    <span class="material-symbols-outlined text-5xl text-on-surface-variant/20">payments</span>
                    <p class="text-on-surface-variant/50 text-sm">Tidak ada pembayaran yang perlu diproses.</p>
                </div>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if ($payments->hasPages())
        <div class="flex items-center justify-between pt-2">
            <p class="text-xs text-on-surface-variant/50">
                Showing {{ $payments->firstItem() }} to {{ $payments->lastItem() }} of {{ $payments->total() }} transactions
            </p>
            <div class="flex items-center gap-1.5">
                @if ($payments->onFirstPage())
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-on-surface-variant/30 bg-white/[0.02] border border-white/5 cursor-not-allowed">
                        <span class="material-symbols-outlined text-sm">chevron_left</span>
                    </span>
                @else
                    <a href="{{ $payments->previousPageUrl() }}"
                        class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-on-surface-variant hover:text-primary hover:bg-white/5 border border-white/10 transition-all">
                        <span class="material-symbols-outlined text-sm">chevron_left</span>
                    </a>
                @endif

                @foreach ($payments->getUrlRange(max(1, $payments->currentPage() - 2), min($payments->lastPage(), $payments->currentPage() + 2)) as $page => $url)
                    @if ($page == $payments->currentPage())
                        <span aria-current="page"
                            class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-sm font-bold text-on-primary-fixed bg-primary-fixed border border-primary-fixed/30 bloom-lime">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                            class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-sm text-on-surface-variant hover:text-primary hover:bg-white/5 border border-white/10 transition-all">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                @if ($payments->hasMorePages())
                    <a href="{{ $payments->nextPageUrl() }}"
                        class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-on-surface-variant hover:text-primary hover:bg-white/5 border border-white/10 transition-all">
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </a>
                @else
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-on-surface-variant/30 bg-white/[0.02] border border-white/5 cursor-not-allowed">
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </span>
                @endif
            </div>
        </div>
    @endif

</div>
@endsection
