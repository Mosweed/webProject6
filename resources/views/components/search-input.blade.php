<div class="pr-2 bg-white border d-flex justify-content-center align-items-center">
  <input {{ $attributes }} type="text" class="form-control mr-sm-2" placeholder="Search">
  <div wire:loading.delay wire:target="searchTerm">
    <div class="la-ball-clip-rotate la-dark la-sm">
      <div></div>
    </div>
  </div>
</div>

