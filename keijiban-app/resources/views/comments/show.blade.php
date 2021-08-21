<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center gap-x-4">
      <div class="max-w-4xl">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ $comment->user->name }}</h1>
      </div>
    </div>

    <div class="py-12">
    <h2>・更新できました！</h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>{{ $comment->body }}</p>
                </div>
            </div>
        </div>
    </div>
  </x-slot>
</x-app-layout>
