@props(['defaultOpen' => true])

<div
    x-data="{
        sidebarOpen: @js($defaultOpen),
        sidebarMobile: false,
        isMobile() { return window.innerWidth < 768; },
        toggleSidebar() {
            this.isMobile()
                ? (this.sidebarMobile = !this.sidebarMobile)
                : (this.sidebarOpen = !this.sidebarOpen);
        },
    }"
    class="flex min-h-svh w-full"
    {{ $attributes }}
>
    {{ $slot }}
</div>
