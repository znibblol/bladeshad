@props(['selected' => null, 'disabled' => false])

@php
$classes = cn('p-3');
@endphp

<div
    x-data="calendar(@js($selected))"
    {{ $attributes->merge(['class' => $classes]) }}
>
    <div class="flex items-center justify-between mb-4 space-x-1">
        <button
            type="button"
            @click="prevMonth()"
            class="inline-flex h-7 w-7 items-center justify-center rounded-md border border-input bg-transparent p-0 opacity-50 hover:opacity-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring"
            aria-label="Go to previous month"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
        </button>
        <div class="text-sm font-medium" x-text="monthName + ' ' + currentYear"></div>
        <button
            type="button"
            @click="nextMonth()"
            class="inline-flex h-7 w-7 items-center justify-center rounded-md border border-input bg-transparent p-0 opacity-50 hover:opacity-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring"
            aria-label="Go to next month"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
        </button>
    </div>

    <div class="grid grid-cols-7 mb-1">
        <template x-for="day in ['Su','Mo','Tu','We','Th','Fr','Sa']" :key="day">
            <div class="flex h-9 w-9 items-center justify-center text-xs font-medium text-muted-foreground" x-text="day"></div>
        </template>
    </div>

    <div class="grid grid-cols-7">
        <template x-for="(day, i) in calendarDays" :key="i">
            <div class="flex items-center justify-center p-0">
                <button
                    x-show="day !== null"
                    type="button"
                    @click="{{ $disabled ? '' : 'selectDay(day)' }}"
                    :disabled="{{ $disabled ? 'true' : 'false' }}"
                    :class="{
                        'bg-primary text-primary-foreground hover:bg-primary hover:text-primary-foreground': isSelected(day),
                        'bg-accent text-accent-foreground': isToday(day) && !isSelected(day),
                        'hover:bg-accent hover:text-accent-foreground': !isSelected(day),
                    }"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-md p-0 text-sm font-normal ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                    x-text="day"
                ></button>
                <div x-show="day === null" class="h-9 w-9"></div>
            </div>
        </template>
    </div>
</div>

<script>
    function calendar(initialSelected) {
        const today = new Date();
        const monthNames = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        return {
            currentYear: today.getFullYear(),
            currentMonth: today.getMonth(),
            selectedDate: initialSelected ? new Date(initialSelected) : null,
            get monthName() {
                return monthNames[this.currentMonth];
            },
            get calendarDays() {
                const firstDay = new Date(this.currentYear, this.currentMonth, 1).getDay();
                const daysInMonth = new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
                const days = Array(firstDay).fill(null);
                for (let d = 1; d <= daysInMonth; d++) days.push(d);
                return days;
            },
            prevMonth() {
                if (this.currentMonth === 0) { this.currentMonth = 11; this.currentYear--; }
                else this.currentMonth--;
            },
            nextMonth() {
                if (this.currentMonth === 11) { this.currentMonth = 0; this.currentYear++; }
                else this.currentMonth++;
            },
            selectDay(day) {
                if (day === null) return;
                if (this.isSelected(day)) {
                    this.selectedDate = null;
                    this.$dispatch('calendar-change', { date: null });
                } else {
                    this.selectedDate = new Date(this.currentYear, this.currentMonth, day);
                    this.$dispatch('calendar-change', { date: this.selectedDate.toISOString().split('T')[0] });
                }
            },
            isSelected(day) {
                if (!this.selectedDate || day === null) return false;
                return this.selectedDate.getFullYear() === this.currentYear
                    && this.selectedDate.getMonth() === this.currentMonth
                    && this.selectedDate.getDate() === day;
            },
            isToday(day) {
                if (day === null) return false;
                return today.getFullYear() === this.currentYear
                    && today.getMonth() === this.currentMonth
                    && today.getDate() === day;
            },
        };
    }
</script>
