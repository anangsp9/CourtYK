<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Tambah Venue | CourtYK Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .inner-glow-lime {
            box-shadow: inset 0 0 12px rgba(202, 243, 0, 0.15);
        }

        .glass-card {
            backdrop-filter: blur(40px);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            border-left: 0.5px solid rgba(255, 255, 255, 0.1);
            border-right: 0.5px solid rgba(255, 255, 255, 0.1);
            border-bottom: 0.5px solid rgba(255, 255, 255, 0.1);
        }

        .bg-void {
            background-color: #131313;
        }

        .bloom-lime {
            box-shadow: 0 0 25px rgba(202, 243, 0, 0.4);
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(202, 243, 0, 0.3);
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "background": "#131313",
                        "on-secondary": "#2b3040",
                        "tertiary-container": "#e5e2e1",
                        "surface-bright": "#393939",
                        "surface-tint": "#b0d500",
                        "on-primary-container": "#596c00",
                        "error": "#ffb4ab",
                        "outline": "#8f9378",
                        "tertiary-fixed": "#e5e2e1",
                        "on-primary-fixed": "#171e00",
                        "surface": "#131313",
                        "on-secondary-fixed-variant": "#414658",
                        "primary": "#ffffff",
                        "tertiary": "#ffffff",
                        "on-tertiary-container": "#656464",
                        "on-error": "#690005",
                        "on-primary-fixed-variant": "#3e4c00",
                        "on-surface": "#e5e2e1",
                        "secondary-fixed": "#dee1f7",
                        "on-error-container": "#ffdad6",
                        "inverse-primary": "#536600",
                        "surface-variant": "#353534",
                        "tertiary-fixed-dim": "#c8c6c5",
                        "on-tertiary": "#303030",
                        "on-secondary-fixed": "#161b2b",
                        "inverse-on-surface": "#313030",
                        "secondary-container": "#414658",
                        "on-background": "#e5e2e1",
                        "surface-container-lowest": "#0e0e0e",
                        "secondary": "#c2c6db",
                        "surface-container-low": "#1c1b1b",
                        "surface-container-high": "#2a2a2a",
                        "outline-variant": "#444932",
                        "on-surface-variant": "#c5c9ac",
                        "error-container": "#93000a",
                        "surface-dim": "#131313",
                        "primary-fixed-dim": "#b0d500",
                        "on-tertiary-fixed-variant": "#474746",
                        "primary-container": "#caf300",
                        "secondary-fixed-dim": "#c2c6db",
                        "surface-container-highest": "#353534",
                        "inverse-surface": "#e5e2e1",
                        "on-secondary-container": "#b0b4c9",
                        "surface-container": "#201f1f",
                        "on-primary": "#2a3400",
                        "primary-fixed": "#caf300",
                        "on-tertiary-fixed": "#1b1b1c"
                    },
                    "borderRadius": {
                        "DEFAULT": "1rem",
                        "lg": "2rem",
                        "xl": "3rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "container-padding-mobile": "1.25rem",
                        "layer-gap": "2rem",
                        "base-unit": "8px",
                        "gutter": "1.5rem",
                        "container-padding-desktop": "2.5rem"
                    },
                    "fontFamily": {
                        "title-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "body-lg": ["Inter"],
                        "display-lg": ["Inter"],
                        "headline-lg-mobile": ["Inter"]
                    },
                    "fontSize": {
                        "title-md": ["20px", {
                            "lineHeight": "1.4",
                            "fontWeight": "500"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "600"
                        }],
                        "label-sm": ["12px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "display-lg": ["48px", {
                            "lineHeight": "1.1",
                            "letterSpacing": "-0.04em",
                            "fontWeight": "700"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "600"
                        }]
                    }
                },
            },
        }
    </script>
</head>

<body class="bg-void text-on-surface font-body-lg min-h-screen overflow-x-hidden">

    <aside
        class="fixed left-0 h-screen w-64 bg-surface-container dark:bg-surface-container-low/80 backdrop-blur-[30px] border-r border-white/15 flex flex-col h-full py-layer-gap z-50">
        <div class="px-6 mb-10">
            <h1 class="font-display-lg text-display-lg text-primary-fixed drop-shadow-[0_0_10px_rgba(202,243,0,0.5)]">
                CourtYK</h1>
            <p class="text-on-surface-variant font-label-sm uppercase tracking-widest mt-1 opacity-60">Admin Console</p>
        </div>
        <nav class="flex-grow space-y-2">
            <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:text-primary transition-colors hover:bg-white/5 mx-4 rounded-xl group"
                href="#">
                <span
                    class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">dashboard</span>
                <span class="font-title-md">Overview</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-primary-fixed bg-primary-container/10 border-r-2 border-primary-fixed inner-glow-lime mx-4 rounded-xl"
                href="#">
                <span class="material-symbols-outlined text-2xl"
                    style="font-variation-settings: 'FILL' 1;">location_on</span>
                <span class="font-title-md">Venues</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:text-primary transition-colors hover:bg-white/5 mx-4 rounded-xl group"
                href="#">
                <span
                    class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">sports_tennis</span>
                <span class="font-title-md">Courts</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:text-primary transition-colors hover:bg-white/5 mx-4 rounded-xl group"
                href="#">
                <span
                    class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">calendar_month</span>
                <span class="font-title-md">Bookings</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:text-primary transition-colors hover:bg-white/5 mx-4 rounded-xl group"
                href="#">
                <span
                    class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">payments</span>
                <span class="font-title-md">Financials</span>
            </a>
        </nav>
        <div class="mt-auto px-6 pt-6 border-t border-white/5">
            <div class="flex items-center gap-3">
                <img class="w-10 h-10 rounded-full border border-primary-container/30"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6r2Fpne54BCY5KSHnjIFepkE_GMIIQUqPJ5bDPq6chhVIrBSwTajtQKT4S9RmtjzFS7DsxGmq7PlUxjbtR65_cWVxMTGwvbXXzVwV3bVx6iLjf1pObWYuUKYlSiy6gcwLt73rqhntOqYowHE091ycTOhnGI4NaRnRdTFBmfG2SIz15R_u7E-xPpALQd6CJ8tbSZkN-URgGznOfxQouo0RWYOxgROFn_Yl3EOVHvuuAZV9rElYVl_VX9yLX3bE7MTh498j6GTq0w" />
                <div>
                    <p class="text-sm font-bold text-on-surface">Alex Rivera</p>
                    <p class="text-xs text-on-surface-variant">System Admin</p>
                </div>
            </div>
        </div>
    </aside>

    <main class="ml-64 min-h-screen relative">
        <header
            class="sticky top-0 w-full h-16 bg-transparent backdrop-blur-[20px] border-b border-white/15 flex justify-between items-center px-container-padding-desktop z-40">
            <div class="flex items-center gap-4">
                <span class="text-on-surface-variant font-label-sm uppercase tracking-widest opacity-70">Management /
                    Venues / New</span>
                <h2 class="font-title-md text-primary">Tambah Venue Baru</h2>
            </div>
        </header>

        <form action="{{ route('admin.venues.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="p-container-padding-desktop max-w-6xl mx-auto space-y-layer-gap pb-32">
                <div class="flex flex-col md:flex-row justify-between items-end gap-4 mb-8">
                    <div>
                        <h1 class="font-headline-lg text-headline-lg text-primary">Tambah Venue</h1>
                        <p class="text-on-surface-variant mt-2 max-w-lg">Lengkapi formulir di bawah ini untuk
                            menambahkan aset fasilitas olahraga premium ke dalam jaringan sistem.</p>
                    </div>
                    <div
                        class="flex items-center gap-2 px-4 py-2 bg-primary-container/10 border border-primary-container/30 rounded-full">
                        <div class="w-2 h-2 rounded-full bg-primary-container animate-pulse"></div>
                        <span class="text-xs font-bold text-primary-fixed uppercase tracking-wider">Draft Mode</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
                    <div class="md:col-span-8 space-y-6">

                        <div class="glass-card bg-surface-container/30 p-8 rounded-lg shadow-2xl">
                            <div class="flex items-center gap-3 mb-8">
                                <div
                                    class="w-10 h-10 rounded-xl bg-primary-container/20 flex items-center justify-center border border-primary-container/40">
                                    <span class="material-symbols-outlined text-primary-container">info</span>
                                </div>
                                <h3 class="font-title-md text-primary">Informasi Utama</h3>
                            </div>

                            <div class="space-y-6">
                                <div class="group">
                                    <label class="block text-label-sm text-on-surface-variant mb-2 ml-1">Nama
                                        Venue</label>
                                    <input type="text" name="name"
                                        class="w-full bg-white/5 border border-white/10 rounded-lg p-4 text-primary focus:ring-2 focus:ring-primary-container/50 focus:border-primary-container outline-none transition-all placeholder:text-white/20"
                                        placeholder="Contoh: Skyline Padel Arena" />
                                </div>

                                <div class="group">
                                    <label class="block text-label-sm text-on-surface-variant mb-2 ml-1">Alamat
                                        Lapangan</label>
                                    <div class="relative">
                                        <input type="text" name="address"
                                            class="w-full bg-white/5 border border-white/10 rounded-lg p-4 pl-12 text-primary focus:ring-2 focus:ring-primary-container/50 focus:border-primary-container outline-none transition-all placeholder:text-white/20"
                                            placeholder="Jalan, kota, atau wilayah lokasi lapangan" />
                                        <span
                                            class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant">location_on</span>
                                    </div>
                                </div>

                                {{-- Input Gambar Venue (Baru) --}}
                                <div class="group">
                                    <label class="block text-label-sm text-on-surface-variant mb-2 ml-1">Gambar
                                        Venue</label>
                                    <input type="file" name="image" accept="image/*"
                                        class="w-full bg-white/5 border border-white/10 rounded-lg p-4 text-primary focus:ring-2 focus:ring-primary-container/50 focus:border-primary-container outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary-container/20 file:text-primary-container hover:file:bg-primary-container/30 cursor-pointer" />
                                    @error('image')
                                        <p class="text-red-400 text-xs mt-1 ml-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label
                                        class="block text-label-sm text-on-surface-variant mb-2 ml-1">Deskripsi</label>
                                    <textarea name="description"
                                        class="w-full bg-white/5 border border-white/10 rounded-lg p-4 text-primary focus:ring-2 focus:ring-primary-container/50 focus:border-primary-container outline-none transition-all placeholder:text-white/20 resize-none"
                                        placeholder="Tuliskan detail keunggulan atau fasilitas yang tersedia..." rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="glass-card bg-surface-container/30 p-8 rounded-lg shadow-2xl">
                            <div class="flex items-center gap-3 mb-8">
                                <div
                                    class="w-10 h-10 rounded-xl bg-primary-container/20 flex items-center justify-center border border-primary-container/40">
                                    <span class="material-symbols-outlined text-primary-container">schedule</span>
                                </div>
                                <h3 class="font-title-md text-primary">Jam Operasional</h3>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-label-sm text-on-surface-variant mb-2 ml-1">Jam
                                        Buka</label>
                                    <input type="time" name="open_time"
                                        class="w-full bg-white/5 border border-white/10 rounded-lg p-4 text-primary focus:ring-2 focus:ring-primary-container/50 focus:border-primary-container outline-none transition-all [color-scheme:dark]" />
                                </div>

                                <div>
                                    <label class="block text-label-sm text-on-surface-variant mb-2 ml-1">Jam
                                        Tutup</label>
                                    <input type="time" name="close_time"
                                        class="w-full bg-white/5 border border-white/10 rounded-lg p-4 text-primary focus:ring-2 focus:ring-primary-container/50 focus:border-primary-container outline-none transition-all [color-scheme:dark]" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="md:col-span-4 space-y-6">
                        <div class="glass-card bg-surface-container/30 p-6 rounded-lg shadow-xl border border-white/5">
                            <h4 class="text-sm font-bold text-primary mb-2 flex items-center gap-2">
                                <span
                                    class="material-symbols-outlined text-primary-container text-base">auto_awesome</span>
                                Catatan Pengisian
                            </h4>
                            <p class="text-xs text-on-surface-variant leading-relaxed">
                                Pastikan jam buka dan tutup diatur sesuai zona waktu operasional lokal setempat agar
                                akurasi sistem booking terjamin. Unggah foto venue dengan kualitas tinggi untuk menarik
                                minat calon pelanggan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="fixed bottom-0 right-0 left-64 h-24 bg-surface-container/60 backdrop-blur-2xl border-t border-white/15 flex items-center justify-between px-container-padding-desktop z-40">
                <div class="flex items-center gap-4 text-on-surface-variant">
                    <span class="material-symbols-outlined text-primary-container">security</span>
                    <p class="text-sm">Perubahan belum tersimpan sampai Anda menekan tombol simpan.</p>
                </div>
                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="px-10 py-3 bg-primary-container text-on-primary-fixed font-bold rounded-full bloom-lime hover:scale-105 active:scale-95 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined">save</span>
                        Simpan Venue
                    </button>
                </div>
            </div>
        </form>
    </main>

    <script>
        document.querySelectorAll('input, textarea').forEach(el => {
            el.addEventListener('focus', () => {
                const container = el.closest('.glass-card');
                if (container) {
                    container.style.boxShadow = '0 0 50px rgba(202, 243, 0, 0.05)';
                    container.style.borderColor = 'rgba(202, 243, 0, 0.3)';
                }
            });
            el.addEventListener('blur', () => {
                const container = el.closest('.glass-card');
                if (container) {
                    container.style.boxShadow = '';
                    container.style.borderColor = '';
                }
            });
        });
    </script>
</body>

</html>
