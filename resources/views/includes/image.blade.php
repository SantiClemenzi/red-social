            <div class="card">
                <div class="card-header">
                    @if($image->user->image)
                    @include('includes.avatar')
                    @endif
                    <a href="{{ url('/user/profile') }}/{{Auth::user()->id}}" style="text-decoration: none;">
                        {{$image->user->username}}
                    </a>
                </div>
                <div class="card-body" style="padding: 0px; border: 0px;">
                    <div class="card" style="width: 100%;">
                        <a href="{{url('image/detail')}}/{{$image->id}}">
                            <img src="{{ route('image.file', ['filename'=>$image->image_path]) }}" alt="" class="card-img-top">
                        </a>
                    </div>
                    <?php $user_like = false; ?>
                    <div class="like" style="margin: 2%; display: inline-block; text-align: justify;">
                        @foreach($image->like as $like)
                        @if($like->user->id == Auth::user()->id)
                        <?php $user_like = true; ?>
                        @endif
                        @endforeach
                        @if($user_like)
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red" class="btn-like" data-id="{{$image->id}}" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="gray" class="btn-like" data-id="{{$image->id}}" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg>
                        @endif
                        <p style="color: gray; float: rigth;"> {{count($image->like)}} </p>
                    </div>

                    <div class="description" style="padding: 1%;">
                        <strong>{{'@'.$image->user->username}} || {{\FormatTime::LongTimeFilter($image->created_at)}}</strong>
                        <p>
                            {{$image->description}}
                        </p>
                    </div>
                    <div style="margin: 1%;">
                        <a href="{{url('image/detail')}}/{{$image->id}}" class="btn btn-warning">Comentarios {{count($image->comments)}}</a>
                    </div>
                </div>
            </div>