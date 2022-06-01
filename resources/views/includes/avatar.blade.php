@if(Auth::user())
<div class="rounded ">
    <img src="{{ route('getImage', ['filename'=>Auth::user()->image]) }}"  class="rounded-10"
  style="width: 35px;" alt="Avatar" />
</div>
@endif