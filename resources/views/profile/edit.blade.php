@extends('layouts.glass')

@section('title', 'CourtYK | Profile')

@section('content')
<div class="mb-14">
    <div class="space-y-3">
        <h1 class="text-4xl md:text-5xl font-black text-gradient tracking-tight">Profile</h1>
        <p class="text-white/50 text-lg font-light max-w-xl leading-relaxed">Kelola informasi akun dan pengaturan keamanan Anda.</p>
    </div>
</div>

<div class="space-y-8 max-w-3xl">
    @include('profile.partials.update-profile-information-form')
    @include('profile.partials.update-password-form')
    @include('profile.partials.delete-user-form')
</div>
@endsection
