@props(['data', 'type' => 'line'])

<div x-data="chart()" x-init="initChart()" class="w-full">
    <canvas x-ref="canvas"></canvas>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function chart() {
        return {
            chart: null,
            data: @json($data),
            initChart() {
                const ctx = this.$refs.canvas.getContext('2d');
                this.chart = new Chart(ctx, {
                    type: '{{ $type }}',
                    data: this.data,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        }
    }
</script>
@endpush