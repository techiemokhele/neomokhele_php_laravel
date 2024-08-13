<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>

    <p>
        This job pays R{{ number_format($job['salary'], 0, ',', ',') }} per month.
    </p>
</x-layout>
