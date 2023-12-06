<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/jquery-confirm.min.css') }}" />
</head>

<body>
    <header>
        <nav class="navbar bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-white bold" href="/">BLOG</a>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Rechercher un blog">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </form>
            </div>
        </nav>
    </header>

    <section class="mt-5 text-center">
        <div class="container">

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h2>Créer un Article</h2>
        </div>
    </section>

    <section>
        <div style="width: 100%;" class="container p-lg-5">
            <div class="text-success msg"> </div>
            <form id="form" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Objet</label>
                    <input name="title" type="texte" class="title form-control" id="exampleFormControlInput1"
                        placeholder="">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Ajouter une image</label>
                    <input name="picture" class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                </div>
                <button type="submit" class="btn btn-success add">Enregistrer</button>
            </form>
        </div>

    </section>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
        <script>
            $('.add').click(function(e) {
                e.preventDefault();

                $.confirm({
                    title: "Confirmation !",
                    type: "orange",
                    content: "Voulez-vous enregistrer ces informations ?",
                    buttons: {
                        Oui:  {
                            btnClass : "btn-success",
                            action : function(){
                                var self =this;
                            var dataForm = $('#form').serialize();
                                    $.ajax({
                                        url: '{{ route('blogstore') }}',
                                        type: 'POST',
                                        data: dataForm,
                                        beforeSend : function(){
                                            self.showLoading(true);
                                            self.buttons.Oui.hide();
                                            self.buttons.Non.hide();
                                        },
                                        success: function(response) {
                                            /* $('.msg').html(response.message); */
                                            $('#form').trigger('reset');
                                            self.hideLoading(true);
                                           /* self.close(); */
                                           self.setType('green');
                                           self.setContent(`${response.message}`);
                                           self.buttons.Oui.hide();
                                           self.buttons.Non.show();
                                           self.buttons.Non.setText('Fermer');
                                        },
                                        error: function() {
                                            return false;
                                        }
                                    })
                           
                                    return false;
                        }
                        },
                        Non:  {
                            btnClass : "btn-danger",
                            action : function(){
                                return true;
                            }
                        }
                    }
                })


                /* console.log("DDDDDDDDDDD") */
            });
        </script>
   {{--  @stop --}}
</body>

</html>
