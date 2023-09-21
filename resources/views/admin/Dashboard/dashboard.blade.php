@extends('admin.layouts.main')

@section('container')
<div class="pt-24 pb-20">
    <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Dashboard</h1>

    <div class="flex flex-col lg:flex-row mt-10 gap-8">
        <div class="w-full lg:w-1/2">
            @include('admin.Dashboard._topBerita')
        </div>
        <div class="w-full lg:w-1/2">
            @include('admin.Dashboard._infoPenting')
            @include('admin.Dashboard._topUmkm')
        </div>
    </div>
</div>
@endsection



@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('accordion', {
                tab: 0
            });

            Alpine.data('accordion', (idx) => ({
                init() {
                    this.idx = idx;
                },
                idx: -1,
                handleClick() {
                    this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                    return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                    return this.$store.accordion.tab === this.idx ?
                        `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
            }));
        })
    </script>
@endpush