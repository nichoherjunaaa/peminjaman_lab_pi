@props([
    'activity' => 'Aktivitas',
    'location' => 'Lokasi',
    'date' => 'Tanggal',
    'status' => 'pending',
    'statusText' => 'Pending'
])

<li class="px-4 py-4 sm:px-6">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="h-10 w-10 rounded-full bg-primary flex items-center justify-center">
                    <i class="fas fa-desktop text-white"></i>
                </div>
            </div>
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">{{ $activity }}</div>
                <div class="text-sm text-gray-500">{{ $location }} - {{ $date }}</div>
            </div>
        </div>
        <div class="flex">
            @php
                $statusClasses = [
                    'pending' => 'bg-yellow-100 text-yellow-800',
                    'approved' => 'bg-green-100 text-green-800',
                    'rejected' => 'bg-red-100 text-red-800'
                ];
                $statusClass = $statusClasses[$status] ?? $statusClasses['pending'];
            @endphp
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClass }}">
                {{ $statusText }}
            </span>
        </div>
    </div>
</li>