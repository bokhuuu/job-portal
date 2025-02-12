<label class="mb-2 text-sm block font-medium text-slate-500" for="{{ $for }}">
    {{ $slot }}
    @if ($required)
        <span>*</span>
    @endif
</label>
