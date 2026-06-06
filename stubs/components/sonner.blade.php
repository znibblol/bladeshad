@props(['position' => 'bottom-right', 'duration' => 4000])

@php
$positionMap = [
    'top-left'      => 'top-4 left-4 items-start',
    'top-center'    => 'top-4 left-1/2 -translate-x-1/2 items-center',
    'top-right'     => 'top-4 right-4 items-end',
    'bottom-left'   => 'bottom-4 left-4 items-start',
    'bottom-center' => 'bottom-4 left-1/2 -translate-x-1/2 items-center',
    'bottom-right'  => 'bottom-4 right-4 items-end',
];
$pos = $positionMap[$position] ?? $positionMap['bottom-right'];
@endphp

<div
    x-data="toaster({{ $duration }})"
    @toast.window="add($event.detail)"
    class="fixed z-[100] flex flex-col gap-2 {{ $pos }}"
    aria-live="polite"
    aria-label="Notifications"
>
    <template x-for="t in toasts" :key="t.id">
        <div
            x-show="t.visible"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-2 scale-95"
            :class="{
                'bg-background text-foreground border border-border': t.type === 'default',
                'bg-destructive text-destructive-foreground': t.type === 'error',
                'bg-green-500 text-white': t.type === 'success',
                'bg-yellow-500 text-white': t.type === 'warning',
                'bg-blue-500 text-white': t.type === 'info',
            }"
            class="pointer-events-auto w-80 rounded-lg p-4 shadow-lg"
            role="alert"
        >
            <div class="flex items-start gap-3">
                <div class="flex-1 min-w-0">
                    <p x-show="t.title" x-text="t.title" class="text-sm font-semibold leading-snug"></p>
                    <p x-show="t.description" x-text="t.description" class="text-sm mt-1 opacity-90"></p>
                </div>
                <button
                    type="button"
                    @click="remove(t.id)"
                    class="shrink-0 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring"
                    aria-label="Dismiss"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </div>
    </template>
</div>

<script>
    function toaster(duration) {
        return {
            toasts: [],
            add(detail) {
                const id = Date.now() + Math.random();
                this.toasts.push({
                    id,
                    visible: true,
                    type: detail.type ?? 'default',
                    title: detail.title ?? '',
                    description: detail.description ?? '',
                });
                setTimeout(() => this.remove(id), duration);
            },
            remove(id) {
                const t = this.toasts.find(t => t.id === id);
                if (t) {
                    t.visible = false;
                    setTimeout(() => { this.toasts = this.toasts.filter(t => t.id !== id); }, 300);
                }
            },
        };
    }

    window.toast = function(title, options = {}) {
        window.dispatchEvent(new CustomEvent('toast', {
            detail: { title, type: options.type ?? 'default', description: options.description ?? '' },
        }));
    };
    window.toast.success = (title, opts = {}) => window.toast(title, { ...opts, type: 'success' });
    window.toast.error   = (title, opts = {}) => window.toast(title, { ...opts, type: 'error' });
    window.toast.warning = (title, opts = {}) => window.toast(title, { ...opts, type: 'warning' });
    window.toast.info    = (title, opts = {}) => window.toast(title, { ...opts, type: 'info' });
</script>
