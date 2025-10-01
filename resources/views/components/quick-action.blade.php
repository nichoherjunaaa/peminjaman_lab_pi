@props([
    'href' => '#',
    'icon' => 'fas fa-plus-circle',
    'title' => 'Aksi Cepat',
    'description' => 'Deskripsi aksi cepat'
])

<a href="{{ $href }}"
   class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-primary card-hover">
    <div class="flex-shrink-0">
        <i class="{{ $icon }} text-primary text-2xl"></i>
    </div>
    <div class="flex-1 min-w-0">
        <span class="absolute inset-0" aria-hidden="true"></span>
        <p class="text-sm font-medium text-gray-900">{{ $title }}</p>
        <p class="text-sm text-gray-500 truncate">{{ $description }}</p>
    </div>
</a>