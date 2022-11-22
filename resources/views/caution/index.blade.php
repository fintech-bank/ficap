@extends("layouts.app")

@section("content")
    <style>
        #canvas_container {
            width: 800px;
            height: 450px;
            overflow: auto;
        }

        #canvas_container {
            background: #333;
            text-align: center;
            border: solid 3px;
        }
    </style>
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Ma Caution</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="fw-bold fs-4 mb-1">Type de caution</div>
                        <div class="">{!! $user->type_caution_label !!}</div>
                    </div>
                    <div class="separator my-5"></div>
                    <div class="d-flex flex-column">
                        <div class="fw-bold fs-4 mb-1">Etat de la caution</div>
                        <div class="">{!! $user->status_label !!}</div>
                    </div>
                    <div class="separator my-5"></div>
                    <div class="d-flex flex-column">
                        <div class="fw-bold fs-4 mb-1">Crédit impacté</div>
                        <a href="{{ route('credit') }}">{{ $user->loan->wallet->name_account_generic }}</a>
                        <div data-bs-toggle="tooltip" title="{!! $user->loan->status_explanation !!}">{!! $user->loan->status_label !!}</div>
                    </div>
                    <div class="separator my-5"></div>
                    <div class="d-flex flex-column">
                        <div class="fw-bold fs-4 mb-1">Lié à la personne</div>
                        <div class="d-flex flex-row">
                            <div class="symbol symbol-30px me-3">
                                <img src="{{ Gravatar::get($user->loan->customer->user->email) }}" alt="">
                            </div>
                            <div class="d-flex flex-column">
                                <div class="fw-bolder">{{ $user->loan->customer->info->full_name }}</div>
                                <div class="">{!!  $user->loan->customer->info->type_label  !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Acte de cautionnement</h3>
                    <div class="card-toolbar">
                        <div class="btn-group me-2" id="navigation_controls">
                            <button class="btn btn-sm btn-icon btn-secondary" id="go_previous"><i class="fa-solid fa-arrow-left"></i> </button>
                            <button class="btn btn-sm btn-icon btn-secondary" id="go_next"><i class="fa-solid fa-arrow-right"></i> </button>
                        </div>
                        <p>Page Actuel: <span id="current_page">1</span></p>

                        <div class="btn-group me-2" id="zoom_controls">
                            <button class="btn btn-sm btn-icon btn-secondary" id="zoom_in"><i class="fa-solid fa-magnifying-glass-plus"></i> </button>
                            <button class="btn btn-sm btn-icon btn-secondary" id="zoom_out"><i class="fa-solid fa-magnifying-glass-minus"></i> </button>
                        </div>
                        <button type="button" class="btn btn-sm btn-success">
                            <i class="fa-solid fa-signature me-2"></i> Signer
                        </button>
                    </div>
                </div>
                <div class="card-body bg-gray-600">
                    <div id="caution_file">
                        <div id="canvas_container">
                            <canvas id="pdf_renderer"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-body">
                    <div id="first" class="text-center">
                        <p class="fs-3">
                            Vous allez recevoir un sms au numéro <strong>{{ $user->phone }}</strong> avec un code permettant de signer ce document.<br>
                            Veuillez saisir le code de 6 caractères après avoir cliqué sur le bouton suivant:
                        </p>
                        <!--<button class="btn btn-lg btn-circle btn-primary btnCode"><i class="fa-solid fa-signature me-2"></i> Je signe</button>-->
                        <x-base.button
                            class="btn btn-lg btn-circle btn-primary btnCode"
                            text="<i class='fa-solid fa-signature me-2'></i> Je signe" />

                    </div>
                    <div id="second" class="text-center">
                        <p class="fs-3">Veuillez taper les 6 chiffres que vous avez reçus sur votre téléphone.</p>
                        <div class="d-flex flex-wrap flex-stack my-3">
                            <input type="text" name="code_1" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
                            <input type="text" name="code_2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
                            <input type="text" name="code_3" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
                            <input type="text" name="code_4" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
                            <input type="text" name="code_5" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
                            <input type="text" name="code_6" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
                        </div>
                        <button class="btn btn-lg btn-circle btn-success btnSign"><i class="fa-solid fa-signature me-2"></i> Signez mon document</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
    <script type="text/javascript">
        $("#second").hide()
        let myState = {
            pdf: null,
            currentPage: 1,
            zoom: 1
        }

        pdfjsLib.getDocument('{{ $document }}').then((pdf) => {
            myState.pdf = pdf;
            render();
        });

        function render() {
            myState.pdf.getPage(myState.currentPage).then((page) => {

                let canvas = document.getElementById("pdf_renderer");
                let ctx = canvas.getContext('2d');

                let viewport = page.getViewport(myState.zoom);

                canvas.width = viewport.width;
                canvas.height = viewport.height;

                page.render({
                    canvasContext: ctx,
                    viewport: viewport
                });
            });
        }

        document.getElementById('go_previous')
            .addEventListener('click', (e) => {
                if(myState.pdf == null|| myState.currentPage === 1)
                    return;

                myState.currentPage -= 1;
                document.getElementById("current_page").value = myState.currentPage;
                render();
            });

        document.getElementById('go_next')
            .addEventListener('click', (e) => {
                if(myState.pdf == null || myState.currentPage > myState.pdf._pdfInfo.numPages)
                    return;

                myState.currentPage += 1;
                document.getElementById("current_page").value = myState.currentPage;
                render();
            });

        document.getElementById('current_page')
            .addEventListener('keypress', (e) => {
                if(myState.pdf == null) return;

                // Get key code
                let code = (e.keyCode ? e.keyCode : e.which);

                // If key code matches that of the Enter key
                if(code === 13) {
                    let desiredPage = document.getElementById('current_page').valueAsNumber;

                    if(desiredPage >= 1 && desiredPage <= myState.pdf._pdfInfo.numPages) {
                        myState.currentPage = desiredPage;
                        document.getElementById("current_page").value = desiredPage;
                        render();
                    }
                }
            });

        document.getElementById('zoom_in')
            .addEventListener('click', (e) => {
                if(myState.pdf == null) return;
                myState.zoom += 0.5;

                render();
            });

        document.getElementById('zoom_out')
            .addEventListener('click', (e) => {
                if(myState.pdf == null) return;
                myState.zoom -= 0.5;

                render();
            });

        document.querySelector('.btnCode').addEventListener('click', e => {
            e.preventDefault()
            e.target.setAttribute('data-kt-indicator', 'on')
            $.ajax({
                url: '/api/request-code',
                method: 'POST',
                data: {
                    'ref_doc': '{{ $ref_doc }}',
                    'num_phone': '{{ $user->phone }}',
                    'sector': 'caution'
                },
                success: data => {
                    e.target.removeAttribute('data-kt-indicator')
                    $("#first").fadeOut()
                    $("#second").fadeIn()
                },
                error: er => {
                    console.error(er)
                }
            })
        })
        document.querySelector('.btnSign').addEventListener('click', e => {
            e.preventDefault()
            e.setAttribute('data-kt-indicator', 'on')
            $.ajax({
                url: '/api/verify-code',
                method: 'POST',
                data: {
                    'ref_doc': '{{ $ref_doc }}',
                    'num_phone': '{{ $user->phone }}',
                    'sector': 'caution',
                    'code': document.querySelector('[name="code_1"]').value+document.querySelector('[name="code_2"]').value+document.querySelector('[name="code_3"]').value
                    +document.querySelector('[name="code_4"]').value+document.querySelector('[name="code_5"]').value+document.querySelector('[name="code_6"]').value,
                },
                success: data => {

                },
                error: er => {
                    console.error(er)
                }
            })
        })
    </script>
@endsection
