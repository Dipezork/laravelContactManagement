<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin Pro</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <!-- Basic registration form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-4">Cadastro</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Registration form-->

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <!-- Form Row-->
                                        <div class="row gx-3">
                                            <div class="col-md-6">
                                                <!-- Form Group (first name)-->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="name">Nome</label>
                                                    <input class="form-control" id="name" name="name"
                                                        type="text" placeholder="Enter name" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Form Group (first name)-->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="role_id">Tipo de usuário</label>
                                                    <select class="form-control" name="role_id" id="role_id">
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}"
                                                                {{ $role->id == $data['role_id'] ? 'selected' : '' }}>
                                                                {{ $role->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- Form Group (email address)            -->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="email">Email</label>
                                            <input class="form-control" id="email" name="email" type="email"
                                                aria-describedby="emailHelp" placeholder="Enter email address" />
                                        </div>
                                        <!-- Form Row    -->
                                        <div class="row gx-3">
                                            <div class="col-md-6">
                                                <!-- Form Group (password)-->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="password">Password</label>
                                                    <input class="form-control" id="password" name="password"
                                                        type="password" placeholder="Enter password" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Form Group (confirm password)-->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="password_confirmation">Confirm
                                                        Password</label>
                                                    <input class="form-control" id="password_confirmation"
                                                        name="password_confirmation" type="password"
                                                        placeholder="Confirm password" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Form Group (create account submit)-->
                                        <button class="btn btn-primary btn-block" type="submit">Criar Conta</button>
                                    </form>

                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="{{ route('login') }}">Já possui conta? Vá para
                                            Login!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
