<div {{ $attributes->merge(['class' => 'card']) }}>
  @if ($title)
    <div class="card-header bg-transparent border-success">
      {{ $title }}
    </div>
  @endif
  @if ($image)
    <x-img src="..." class="card-img-top" alt="..."></x-img>
  @endif
  <div class="card-body text-success">
    <p class="card-text">{{ $slot }}</p>
  </div>
  @if ($footer)
    <div class="card-footer bg-transparent border-success">
      {{ $footer }}
    </div>
  @endif
</div>
