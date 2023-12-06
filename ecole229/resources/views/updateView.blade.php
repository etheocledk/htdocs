<div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">je</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>












{{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
 <script>
      $('.updateView').click(function(){
         var id = $(this).attr('data-id')
         console.log(id);
         $.ajax({
             url:"{{route('updateView')}}/"+id
             /* type : "HTML", */
             success : function (vue){
                 $('#monModal').html.vue;
                 $('#monModal').modal('show');
 
             }
         })
      })
 </script> --}}
