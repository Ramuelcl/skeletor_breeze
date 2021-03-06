{{-- crear.blade.php --}}
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('New') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <!-- Session Status -->
          <x-auth-session-status class="mb-4" :status="session('status')" /> <!-- Validation Errors -->
          {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
          <form action="{{ route('posts.store') }}" method="post">
            @csrf
            {{-- <input type="hidden" name="user" value="1"> --}}

            @include('posts.crear-editar')

          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
