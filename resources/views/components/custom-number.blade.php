@props([
    'name' => '',
    'value' => '',
    'placeholder' => '',
    'min' => null,
    'max' => null,
    'step' => 1,
    'prefix' => '',
])

@php
    $currentValue = old($name, $value);
    $hasError = $errors->has($name);
@endphp

<div
    x-data="{
        value: @js($currentValue),
        min: @js($min),
        max: @js($max),
        step: @js($step),
        get numericValue() {
            return parseFloat(this.value) || 0;
        },
        increment() {
            let next = this.numericValue + this.step;
            if (this.max !== null && next > this.max) next = this.max;
            this.value = String(next);
            this.$el.querySelector('input[type=number]').dispatchEvent(new Event('input', { bubbles: true }));
        },
        decrement() {
            let next = this.numericValue - this.step;
            if (this.min !== null && next < this.min) next = this.min;
            this.value = String(next);
            this.$el.querySelector('input[type=number]').dispatchEvent(new Event('input', { bubbles: true }));
        },
    }"
    class="relative"
>
    <div class="relative flex items-center">
        @if ($prefix)
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-on-surface-variant/40 text-sm font-medium z-10 pointer-events-none select-none">{{ $prefix }}</span>
        @endif
        <input type="number" name="{{ $name }}" x-model="value"
            x-on:input="value = $event.target.value"
            placeholder="{{ $placeholder }}"
            @if ($min !== null) min="{{ $min }}" @endif
            @if ($max !== null) max="{{ $max }}" @endif
            step="{{ $step }}"
            class="w-full bg-white/5 border rounded-lg py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/40 focus:ring-1 focus:ring-primary-fixed focus:outline-none backdrop-blur-md transition-all
                {{ $prefix ? 'pl-10 pr-12' : 'px-3.5' }}
                {{ $hasError ? 'border-red-400/50' : 'border-white/10' }}"
        >
        <div class="absolute right-1.5 top-1/2 -translate-y-1/2 flex flex-col">
            <button type="button" x-on:click="increment()"
                class="flex items-center justify-center w-6 h-4 rounded-t text-on-surface-variant/40 hover:text-primary-fixed hover:bg-white/5 transition-colors">
                <span class="material-symbols-outlined text-[14px]">expand_less</span>
            </button>
            <button type="button" x-on:click="decrement()"
                class="flex items-center justify-center w-6 h-4 rounded-b text-on-surface-variant/40 hover:text-primary-fixed hover:bg-white/5 transition-colors">
                <span class="material-symbols-outlined text-[14px]">expand_more</span>
            </button>
        </div>
    </div>
    @error($name)
        <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1">
            <span class="material-symbols-outlined text-[12px]">error</span>
            {{ $message }}
        </p>
    @enderror
</div>
