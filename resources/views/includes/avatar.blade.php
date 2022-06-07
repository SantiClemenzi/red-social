@if(Auth::user())
<div class="rounded ">
    <img src="{{ route('getImage', ['filename'=>Auth::user()->image]) }}"  class="rounded-10"
  style="width: 45px; border-radius: 900px;" alt="Avatar" />
</div>
@endif