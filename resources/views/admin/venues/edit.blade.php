@extends('layouts.admin')

@section('content')
<style>
    .liquid-glass {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.01) 100%);
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        border-left: 0.5px solid rgba(255, 255, 255, 0.1);
        border-right: 0.5px solid rgba(255, 255, 255, 0.1);
        border-bottom: 0.5px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(30px);
    }
    .bloom-lime {
        box-shadow: 0 0 20px rgba(202, 243, 0, 0.4);
    }
    .glass-card-highlight {
        transition: box-shadow 0.3s ease, border-color 0.3s ease;
    }
</style>

<div class="pb-32">

    @if ($errors->any())
        <div class="mb-6 rounded-xl bg-red-500/10 border border-red-500/20 p-4 backdrop-blur-[10px]">
            <div class="flex items-center gap-2.5 text-red-400 mb-2">
                <span class="material-symbols-outlined text-lg">error</span>
                <span class="text-sm font-semibold">Terdapat kesalahan pada formulir</span>
            </div>
            <ul class="list-disc list-inside text-sm text-red-300 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
        <div>
            <h2 class="text-2xl sm:text-3xl font-bold text-on-surface tracking-tight">Edit Venue</h2>
            <p class="text-on-surface-variant mt-1 max-w-lg text-sm">Update the details for <span class="text-primary-fixed font-semibold">{{ $venue->name }}</span>.</p>
        </div>
        <div class="flex items-center gap-2 px-4 py-2 bg-primary-container/10 border border-primary-container/30 rounded-full">
            <span class="w-2 h-2 rounded-full bg-primary-fixed"></span>
            <span class="text-[11px] font-bold text-primary-fixed uppercase tracking-wider">Edit Mode</span>
        </div>
    </div>

    <form action="{{ route('admin.venues.update', $venue) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

            <div class="md:col-span-7 space-y-6">

                <div class="liquid-glass rounded-2xl p-8 glass-card-highlight">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 rounded-xl bg-primary-container/20 flex items-center justify-center border border-primary-container/40">
                            <span class="material-symbols-outlined text-primary-fixed">info</span>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface">Basic Information</h3>
                    </div>
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-xs font-semibold text-on-surface-variant mb-2 ml-1 uppercase tracking-wider">Venue Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $venue->name) }}" required
                                class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-on-surface focus:ring-2 focus:ring-primary-fixed/50 focus:border-primary-fixed outline-none transition-all placeholder:text-white/20"
                                placeholder="e.g. Skyline Padel Arena">
                            @error('name')
                                <p class="text-red-400 text-xs mt-1.5 ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="address" class="block text-xs font-semibold text-on-surface-variant mb-2 ml-1 uppercase tracking-wider">Location / Address</label>
                            <div class="relative">
                                <input type="text" name="address" id="address" value="{{ old('address', $venue->address) }}" required
                                    class="w-full bg-white/5 border border-white/10 rounded-xl p-4 pl-12 text-on-surface focus:ring-2 focus:ring-primary-fixed/50 focus:border-primary-fixed outline-none transition-all placeholder:text-white/20"
                                    placeholder="Full street address, city, zip">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant">location_on</span>
                            </div>
                            @error('address')
                                <p class="text-red-400 text-xs mt-1.5 ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="description" class="block text-xs font-semibold text-on-surface-variant mb-2 ml-1 uppercase tracking-wider">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-on-surface focus:ring-2 focus:ring-primary-fixed/50 focus:border-primary-fixed outline-none transition-all placeholder:text-white/20 resize-none"
                                placeholder="Tell users what makes your venue special...">{{ old('description', $venue->description) }}</textarea>
                            @error('description')
                                <p class="text-red-400 text-xs mt-1.5 ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="liquid-glass rounded-2xl p-8 glass-card-highlight">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 rounded-xl bg-primary-container/20 flex items-center justify-center border border-primary-container/40">
                            <span class="material-symbols-outlined text-primary-fixed">schedule</span>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface">Operational Details</h3>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="open_time" class="block text-xs font-semibold text-on-surface-variant mb-2 ml-1 uppercase tracking-wider">Opening Time</label>
                            <input type="time" name="open_time" id="open_time"
                                value="{{ old('open_time', $venue->open_time ? \Carbon\Carbon::parse($venue->open_time)->format('H:i') : '') }}" required
                                class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-on-surface focus:ring-2 focus:ring-primary-fixed/50 focus:border-primary-fixed outline-none transition-all [color-scheme:dark]">
                            @error('open_time')
                                <p class="text-red-400 text-xs mt-1.5 ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="close_time" class="block text-xs font-semibold text-on-surface-variant mb-2 ml-1 uppercase tracking-wider">Closing Time</label>
                            <input type="time" name="close_time" id="close_time"
                                value="{{ old('close_time', $venue->close_time ? \Carbon\Carbon::parse($venue->close_time)->format('H:i') : '') }}" required
                                class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-on-surface focus:ring-2 focus:ring-primary-fixed/50 focus:border-primary-fixed outline-none transition-all [color-scheme:dark]">
                            @error('close_time')
                                <p class="text-red-400 text-xs mt-1.5 ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>

            <div class="md:col-span-5 space-y-6">

                <div class="liquid-glass rounded-2xl p-8 glass-card-highlight">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 rounded-xl bg-primary-container/20 flex items-center justify-center border border-primary-container/40">
                            <span class="material-symbols-outlined text-primary-fixed">image</span>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface">Media Gallery</h3>
                    </div>
                    <div class="space-y-5">
                        @if ($venue->image)
                            <div>
                                <p class="text-xs font-semibold text-on-surface-variant mb-2 ml-1 uppercase tracking-wider">Current Image</p>
                                <div class="relative rounded-xl overflow-hidden border border-white/10 aspect-video">
                                    <img src="{{ asset('storage/' . $venue->image) }}" alt="{{ $venue->name }}"
                                         class="w-full h-full object-cover">
                                    <div class="absolute bottom-2 left-2 flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-black/50 backdrop-blur-md border border-white/10">
                                        <span class="material-symbols-outlined text-[14px] text-primary-fixed">check_circle</span>
                                        <span class="text-[11px] font-medium text-white">Current</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div>
                            <p class="text-xs font-semibold text-on-surface-variant mb-2 ml-1 uppercase tracking-wider">Replace Image</p>
                            <label for="image" class="relative border-2 border-dashed border-white/10 rounded-xl p-6 flex flex-col items-center justify-center text-center group hover:border-primary-fixed/50 transition-all cursor-pointer bg-white/[0.02] hover:bg-white/5 overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-t from-primary-fixed/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                                <span class="material-symbols-outlined text-3xl text-on-surface-variant group-hover:text-primary-fixed group-hover:scale-110 transition-all mb-3">upload_file</span>
                                <p class="text-sm font-bold text-on-surface">{{ $venue->image ? 'Tap to replace' : 'Drag & Drop Cover Image' }}</p>
                                <p class="text-xs text-on-surface-variant/60 mt-1.5">JPG, PNG, WebP max 2MB</p>
                                <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/webp" class="hidden">
                            </label>
                            <div id="image-preview" class="mt-4 hidden">
                                <div class="relative rounded-xl overflow-hidden border border-white/10 aspect-video">
                                    <img id="preview-img" class="w-full h-full object-cover">
                                    <button type="button" id="remove-image" class="absolute top-2 right-2 w-8 h-8 rounded-full bg-black/60 backdrop-blur-md border border-white/10 flex items-center justify-center text-white hover:bg-red-500 transition-all">
                                        <span class="material-symbols-outlined text-[18px]">close</span>
                                    </button>
                                </div>
                            </div>
                            <p class="text-xs text-on-surface-variant/50 mt-2 ml-1">Kosongkan jika tidak ingin mengganti gambar.</p>
                        </div>
                        @error('image')
                            <p class="text-red-400 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="liquid-glass rounded-2xl p-7 glass-card-highlight">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-9 h-9 rounded-xl bg-primary-container/20 flex items-center justify-center border border-primary-container/40">
                            <span class="material-symbols-outlined text-primary-fixed text-xl">checklist</span>
                        </div>
                        <h3 class="text-[17px] font-bold text-on-surface">Facilities &amp; Amenities</h3>
                    </div>
                    <div class="grid grid-cols-2 gap-2.5">
                        @foreach (config('facilities') as $key => $facility)
                            <label class="flex items-center gap-2.5 p-3 rounded-xl bg-white/5 border border-white/5 hover:border-primary-fixed/30 hover:bg-white/[0.07] transition-all cursor-pointer group">
                                <input type="checkbox" name="featured_facilities[]" value="{{ $key }}"
                                    class="w-[18px] h-[18px] rounded border-white/20 text-primary-fixed focus:ring-primary-fixed/50 bg-transparent shrink-0"
                                    @checked(in_array($key, old('featured_facilities', $venue->featured_facilities ?? [])))>
                                <span class="material-symbols-outlined text-on-surface-variant group-hover:text-primary-fixed transition-colors text-xl shrink-0">{{ $facility['icon'] }}</span>
                                <span class="text-sm font-medium text-on-surface truncate">{{ $facility['label'] }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('featured_facilities')
                        <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                    @enderror
                </div>

            </div>

        </div>

        <div class="fixed bottom-0 right-0 left-0 lg:left-60 h-20 bg-surface-container/70 backdrop-blur-2xl border-t border-white/10 flex items-center justify-between px-4 sm:px-6 lg:px-8 z-40">
            <div class="flex items-center gap-3 text-on-surface-variant">
                <span class="material-symbols-outlined text-primary-fixed text-lg">auto_awesome</span>
                <p class="text-sm hidden sm:block">Unsaved changes will be lost if you leave.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.venues.index') }}"
                   class="px-6 py-2.5 rounded-full text-on-surface-variant font-medium hover:bg-white/5 transition-all text-sm">
                    Cancel
                </a>
                <button type="submit"
                        class="px-8 py-2.5 bg-primary-container text-on-primary-fixed font-bold rounded-full bloom-lime hover:scale-[1.02] active:scale-95 transition-all flex items-center gap-2 text-sm">
                    <span class="material-symbols-outlined text-lg">publish</span>
                    Update Venue
                </button>
            </div>
        </div>

    </form>

</div>

<script>
    document.querySelectorAll('.glass-card-highlight').forEach(card => {
        const inputs = card.querySelectorAll('input, textarea');
        inputs.forEach(el => {
            el.addEventListener('focus', () => {
                card.style.boxShadow = '0 0 50px rgba(202, 243, 0, 0.05)';
                card.style.borderColor = 'rgba(202, 243, 0, 0.3)';
            });
            el.addEventListener('blur', () => {
                card.style.boxShadow = '';
                card.style.borderColor = '';
            });
        });
    });

    const fileInput = document.getElementById('image');
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    const removeBtn = document.getElementById('remove-image');

    if (fileInput) {
        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        removeBtn.addEventListener('click', function() {
            fileInput.value = '';
            preview.classList.add('hidden');
            previewImg.src = '';
        });
    }
</script>
@endsection
