@props([
    'name' => '',
    'options' => [],
    'selected' => null,
    'placeholder' => '-- Pilih --',
    'valueField' => 'id',
    'labelField' => 'name',
])

@php
    $resolvedOptions = [];
    if ($options instanceof \Illuminate\Support\Enumerable) {
        foreach ($options as $item) {
            $resolvedOptions[$item->{$valueField}] = $item->{$labelField};
        }
    } else {
        foreach ($options as $key => $item) {
            if (is_array($item) && isset($item[$labelField])) {
                $resolvedOptions[$key] = $item[$labelField];
            } else {
                $resolvedOptions[$key] = $item;
            }
        }
    }
    $currentValue = old($name, $selected);
    $currentLabel = $resolvedOptions[$currentValue] ?? null;
    $hasError = $errors->has($name);
@endphp

<div
    x-data="{
        open: false,
        value: @js($currentValue),
        label: @js($currentLabel),
        options: @js($resolvedOptions),
        select(val, lbl) {
            this.value = val;
            this.label = lbl;
            this.open = false;
            this.$el.querySelector('input[type=hidden]').dispatchEvent(new Event('input', { bubbles: true }));
            this.$el.querySelector('input[type=hidden]').dispatchEvent(new Event('change', { bubbles: true }));
        },
        toggle() {
            this.open = !this.open;
        },
        close() {
            this.open = false;
        },
    }"
    x-on:click.outside="close()"
    x-on:keydown.escape="close()"
    class="relative"
>
    <input type="hidden" name="{{ $name }}" x-model="value">

    <button type="button"
        x-on:click="toggle()"
        x-on:keydown.down.prevent="open = true"
        x-on:keydown.up.prevent="open = true"
        class="w-full bg-white/5 border rounded-lg py-2.5 px-3.5 text-sm text-left focus:ring-1 focus:ring-primary-fixed focus:outline-none backdrop-blur-md transition-all flex items-center justify-between gap-2
            {{ $hasError ? 'border-red-400/50' : 'border-white/10' }}"
        :class="{
            'text-on-surface': value,
            'text-on-surface-variant/40': !value
        }"
    >
        <span x-text="label || '{{ $placeholder }}'" class="truncate"></span>
        <span class="material-symbols-outlined text-base text-on-surface-variant/40 transition-transform duration-200"
              :class="{ 'rotate-180': open }">expand_more</span>
    </button>

    <div x-show="open"
        x-transition:enter="transition-all duration-200 ease-out"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition-all duration-150 ease-in"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        x-cloak
        class="absolute z-50 mt-1.5 w-full max-h-56 overflow-y-auto rounded-lg bg-surface-container-high border border-white/10 backdrop-blur-xl shadow-[0_20px_60px_rgba(0,0,0,0.6)] custom-scroll"
        x-ref="dropdown"
    >
        <template x-if="Object.keys(options).length === 0">
            <div class="px-3.5 py-2.5 text-sm text-on-surface-variant/40">Tidak ada data</div>
        </template>
        <template x-for="(lbl, val) in options" :key="val">
            <button type="button"
                x-on:click="select(val, lbl)"
                x-on:keydown.enter="select(val, lbl)"
                class="w-full px-3.5 py-2.5 text-sm text-left transition-colors duration-150"
                :class="{
                    'text-primary-fixed bg-primary-container/20': value === val,
                    'text-on-surface hover:text-primary-fixed hover:bg-primary-container/10': value !== val
                }"
                x-text="lbl"
            ></button>
        </template>
    </div>
</div>
