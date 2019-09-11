<div class="register-holder">

    <div class="row">

        <div class="{{ $clases }} bg-white border text-center mt-2 pr-5 pl-5 pt-2 pb-0">


            <h3>Inscreva-se para ver fotos e vídeos de seus amigos</h3>


            <div class="mt-2 mb-3">

                <button type="" class="btn btn-primary btn-block">

                    Entre com Facebook

                </button>

            </div>

               

            <form method="POST" action="{{ route('register') }}">

                {{ csrf_field() }}


                <div class="form-group row">                    


                    <div class="col-md-12">

                        <input placeholder="Nome" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required="" autofocus="">


                        @if ($errors->has('name'))

                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $errors->first('name') }}</strong>

                            </span>

                        @endif

                    </div>

                </div>


                <div class="form-group row">                    


                    <div class="col-md-12">

                        <input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required="">


                        @if ($errors->has('email'))

                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $errors->first('email') }}</strong>

                            </span>

                        @endif

                    </div>

                </div>


                <div class="form-group row">                    


                    <div class="col-md-12">

                        <input placeholder="Senha" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required="">


                        @if ($errors->has('password'))

                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $errors->first('password') }}</strong>

                            </span>

                        @endif

                    </div>

                </div>


                <div class="form-group row">

                   


                    <div class="col-md-12">

                        <input placeholder="Confirme a senha" id="password-confirm" type="password" class="form-control" name="password_confirmation" required="">

                    </div>

                </div>


                <div class="form-group row">

                    <div class="col-md-12">

                        <button type="submit" class="btn btn-primary">

                            Registrar

                        </button>

                    </div>

                </div>


                 <div class="form-group row">

                        <div class="col-md-12">

                            <p>

                                Ao se registrar, você aceita nossas Condições, a Política de Dados e a Política de Cookies.

                            </p>

                        </div>

                    </div>

            </form>

               

           

        </div>

    </div>


    <div class="row mt-4">

        <div class="{{ $clases }} bg-white border text-center">

            <p class="m-3">

                Você tem uma conta? <a href="{{ route('login') }}">entrar</a>

            </p>

        </div>

    </div>


</div> 