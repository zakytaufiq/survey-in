<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan-view</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="/fontawesome5/css/all.css">
    <link rel="stylesheet" href="/css/custom-view.css">
</head>

<body>

    <div class="container-fluid d-flex flex-column ps-0 pe-0 m-0" style="background: #F3F8FF;">

        <!-- Header Section -->
        <div class="header d-flex justify-content-between align-items-centers p-2">
            <div class="logo d-flex align-items-center ms-3">
                <!-- Header Icon -->
                <!-- <img src="img/logo.png" alt="" style="width: 3em;">
                <p class=" m-0 ms-1 fw-bold" style="color: #F8B94A;">Survei</p> -->
                <!-- jika ingin pakai yg icon lepas comment bagian dalam ini -->

                <!-- Header Judul -->
                <a href="/user/beranda" class="nav-link"><i class="fas fa-chevron-left text-black"></i></a>
                <span>Pengaturan</span>
                <!-- jika ingin pakai yg judul lepas comment bagian dalam ini -->
            </div>

            <div class="dropdown me-1">
                <button class="btn btn-secondary shadow-none border-0" style="background: #F3F8FF;" type="button"
                    id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v text-black"></i>
                </button>
                <ul class="dropdown-menu shadow-sm" aria-labelledby="dropdownMenu2">
                    <li><a href="" class="dropdown-item text-decoration-none text-black">Pengaturan</a></li>
                    <li><a href="" class="dropdown-item text-decoration-none text-black">Tentang</a></li>
                    <li><a href="" class="dropdown-item text-decoration-none text-black">Keluar</a></li>
                </ul>
            </div>
        </div>
        <!-- Header Section -->

        <!-- Content Section -->
        <div class="content">
            <div class="container">

                <div class="pengaturan-menu col-12 d-flex mt-3 justify-content-center">
                    <div class="card bg-white p-4 col-10 col-sm-8 d-flex flex-column align-items-sm-center"
                        style="border-radius: 1em; box-shadow: 0px 0px 2px gray;">
                        <img src="/img/password.png" alt="">
                        <h4 class="mt-2 fs-5 fw-bold">Edit Password</h4>
                        <p class="" style="color: #A5A5A5;">Ubah password anda demi keamanan privasi Anda</p>
                        <a href="pengaturan/edit-password" class="btn btn-primary"
                            style="border: none; border-radius: .5em; background: #3F4FC8;">Edit Password</a>
                    </div>
                </div>

                <!-- good luck have fun :) -->
            </div>
        </div>
        <!-- Content Section -->


        <!-- Navbar -->
        <nav class="navbar navbar-dark navbar-expand fixed-bottom pb-0" style="background: #3F4FC8;">
            <ul class="navbar-nav nav-justified w-100">
                <li class="nav-item position-relative">
                    <i class="fas fa-home"></i>
                    <a href="#" class="nav-link text-white d-flex justify-content-center align-items-end">Beranda</a>
                </li>
                <li class="nav-item">
                    <i class="fas fa-folder-minus"></i>
                    <a href="#" class="nav-link text-white d-flex justify-content-center align-items-end">Data
                        Survei</a>
                </li>
                <li class="nav-item">
                    <i class="fas fa-folder-plus"></i>
                    <a href="#" class="nav-link text-white d-flex justify-content-center align-items-end">Tambah
                        Data</a>
                </li>
                <li class="nav-item">
                    <i class="fas fa-user"></i>
                    <a href="#" class="nav-link text-white d-flex justify-content-center align-items-end">Profil</a>
                </li>
            </ul>
        </nav>

    </div>

</body>

</html>