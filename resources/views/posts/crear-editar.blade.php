{{-- crear-editar.blade.php --}}

<div>
  {{-- campos ocultos --}}
  <input type="hidden" name="user">
  <input type="hidden" name="slug">
  <input type="hidden" name="status">
  {{-- campos ocultos --}}

  <x-label for="title" :value="__('Title')" />

  <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
  @error('title')
    <small>{{ $message }}</small>
    <br>
  @enderror
</div>

<div>
  <x-label for="content" :value="__('Content')" />

  <x-input id="content" class="block mt-1 w-full" type="text" name="content" :value="old('content')" required
    autofocus />
  @error('content')
    <small>{{ $message }}</small>
    <br>
  @enderror
</div>

<x-button class="ml-3">
  {{ __('Save') }}
</x-button>
