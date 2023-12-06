 @if (isset($pageName))
     <div class="container">
         <div class="row">
             @if (isset($blogs_list))
                 @foreach ($blogs_list as $item)
                    <div class=" card col-md-4 mb-4 ">
                        <div class="  card box-shadow">
                             <img @if (!empty($item['picture'])) src="{{ asset($item['picture']) }}"
                          @else
                           src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSg-3382ZgdUhzsOz0VYE8KVNtX_HTwTxRSps08Nli1&s
                          " alt="Image cap" @endif
                                 height="225" style="width: 100%; height:225px; object-fit:cover;" class="card-img-top">
                        </div>
                        <div class=" card-body">
                            @if($item->user)
                                <p> par {{$item->user->full_name}} {{$item->user->age}}</p>@endif
                            
                        
                             <h2>{{ $item['title'] }} {{ $pageName }}</h2>
                             <p class="card-text text-justify">{{ $item['content'] }}</p>
                             <div class="d-flex justify-content-between align-items-center">
                                 <div class="btn-group">
                                     <a href="{{ route('indexWidthId', ['id' => $item['id']]) }}"
                                         class="btn btn-sm btn-outline-secondary">Voir</a>
                                     <button type="button" data-id="{{$item['id']}}" class="btn updateView btn-sm btn-outline-secondary">Modifier</button>
                                 </div>
                                 <small class="text-muted">9 mins</small>
                             </div>
                        </div>

                        

                    </div>
                 @endforeach

                 
                 <div class="d-flex justify-content-end">
                    {{$blogs_list->links()}}
                 </div>

             @endif

             czz
         </div>
     </div>
 @endif
 <script src="{{ asset('js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('js/jquery.js') }}"></script>
 <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
<script>
     $('.updateView').click(function(){
        var id = $(this).attr('data-id')
        $.ajax({
            url:"{{route('updateView')}}/"+id,
            success : function (vue){
                $('#monModal').html(vue);
                $('#monModal').modal('show');

            }
        })
     })
</script>
