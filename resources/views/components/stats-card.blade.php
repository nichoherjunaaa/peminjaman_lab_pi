@props([
    'icon' => 'fas fa-chart-bar',
    'title' => 'Statistik',
    'value' => '0',
    'color' => 'primary'
])

<div class="bg-white overflow-hidden shadow rounded-lg card-hover">
    <div class="p-5">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <i class="{{ $icon }} text-{{ $color }} text-2xl"></i>
            </div>
            <div class="ml-5 w-0 flex-1">
                <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">{{ $title }}</dt>
                    <dd>
                        <div class="text-lg font-medium text-gray-900">{{ $value }}</div>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>