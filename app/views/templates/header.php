<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/index.css">

    <title>Halaman <?= $data['judul']; ?></title>
</head>

<body>

    <div class="screen-cover d-none d-xl-none"></div>

    <div class="row">
        <div class="col-12 col-lg-3 col-navbar d-block">

            <aside class="sidebar">
                <div class="d-flex flex-column justify-content-center align-items-center">

                    <button id="toggle-navbar" onclick="toggleNavbar()">
                        <img src="./assets/img/global/navbar-times.svg" class="" alt="">
                    </button>

                    <div class="profile-img">
                        <img src="./assets/img/global/sidebar/profile.png" alt="">
                    </div>

                    <?php if(isset($_SESSION['login'])): ?>
                    <h4 class="profile-name"><?= $_SESSION['namaUser'] ?></h4>
                    <p class="profile-email">@<?= $_SESSION['userName'] ?></p>
                    <?php else: ?>
                    <h4 class="profile-name">Selamat datang!</h4>
                    <p class="profile-email">Web Pemesanan Kamar</p>
                    <?php endif; ?>
                </div>


                <div class="sidebar-item-container">

                    <!-- <a class="nav-item nav-link" href="<?= BASEURL; ?>">Home</a>
                            <?php if(isset($_SESSION['login'])): ?>
                            <?php if($_SESSION['isAdmin'] == 1): ?>
                            <a class="nav-item nav-link" href="<?= BASEURL; ?>/customer">Customer</a>
                            <a class="nav-item nav-link" href="<?= BASEURL; ?>/kamar">Kamar</a>
                            <a class="nav-item nav-link" href="<?= BASEURL; ?>/pemesanan">Pemesanan</a>
                            <?php endif; ?>
                            <?php if($_SESSION['isAdmin'] == 0): ?>
                            <a class="nav-item nav-link" href="<?= BASEURL; ?>/pemesanan">Pesanan saya</a>
                            <?php endif; ?>
                            <?php endif; ?> -->

                    <?php if(isset($_SESSION['login'])): ?>
                    <?php if($_SESSION['isAdmin'] == 1): ?>

                    <a href="<?= BASEURL; ?>" class="sidebar-item <?= ($data['page'] == 'home') ? 'active' : ' ' ?>"
                        onclick="toggleActive(this)">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 14H14V21H21V14Z" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M10 14H3V21H10V14Z" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M21 3H14V10H21V3Z" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M10 3H3V10H10V3Z" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <span>Kelola kamar</span>
                    </a>

                    <a href="<?= BASEURL; ?>/customer"
                        class="sidebar-item <?= ($data['page'] == 'customer') ? 'active' : ' ' ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 2L3 6V20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H19C19.5304 22 20.0391 21.7893 20.4142 21.4142C20.7893 21.0391 21 20.5304 21 20V6L18 2H6Z"
                                stroke="#7E8CAC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M16 10C16 11.0609 15.5786 12.0783 14.8284 12.8284C14.0783 13.5786 13.0609 14 12 14C10.9391 14 9.92172 13.5786 9.17157 12.8284C8.42143 12.0783 8 11.0609 8 10"
                                stroke="#7E8CAC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3 6H21" stroke="#7E8CAC" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <span>User</span>
                    </a>

                    <!-- <a href="<?= BASEURL; ?>/kamar"
                        class="sidebar-item <?= ($data['page'] == 'kamar') ? 'active' : ' ' ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21 11.5C21.0034 12.8199 20.6951 14.1219 20.1 15.3C19.3944 16.7117 18.3098 17.8992 16.9674 18.7293C15.6251 19.5594 14.0782 19.9994 12.5 20C11.1801 20.0034 9.87812 19.6951 8.7 19.1L3 21L4.9 15.3C4.30493 14.1219 3.99656 12.8199 4 11.5C4.00061 9.92176 4.44061 8.37485 5.27072 7.03255C6.10083 5.69025 7.28825 4.60557 8.7 3.9C9.87812 3.30493 11.1801 2.99656 12.5 3H13C15.0843 3.11499 17.053 3.99476 18.5291 5.47086C20.0052 6.94696 20.885 8.91565 21 11V11.5Z"
                                stroke="#7E8CAC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span>Kamar</span>
                    </a> -->

                    <a href="<?= BASEURL; ?>/pemesanan"
                        class="sidebar-item <?= ($data['judul'] == 'Pemesanan') ? 'active' : ' ' ?>"
                        onclick="toggleActive(this)">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21 4H3C1.89543 4 1 4.89543 1 6V18C1 19.1046 1.89543 20 3 20H21C22.1046 20 23 19.1046 23 18V6C23 4.89543 22.1046 4 21 4Z"
                                stroke="#7E8CAC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M1 10H23" stroke="#7E8CAC" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <span>Pemesanan</span>
                    </a>

                    <a href="<?= BASEURL; ?>/pengguna/keluar" class="sidebar-item" onclick="toggleActive(this)">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.36 6.64C19.6184 7.89879 20.4753 9.50244 20.8223 11.2482C21.1693 12.9939 20.9909 14.8034 20.3096 16.4478C19.6284 18.0921 18.4748 19.4976 16.9948 20.4864C15.5148 21.4752 13.7749 22.0029 11.995 22.0029C10.2151 22.0029 8.47515 21.4752 6.99517 20.4864C5.51519 19.4976 4.36164 18.0921 3.68036 16.4478C2.99909 14.8034 2.82069 12.9939 3.16772 11.2482C3.51475 9.50244 4.37162 7.89879 5.63 6.64"
                                stroke="#7E8CAC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 2V12" stroke="#7E8CAC" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <span>Log Out</span>
                    </a>

                    <?php endif; ?>

                    <!-- Jika Customer -->
                    <?php if($_SESSION['isAdmin'] == 0): ?>

                    <a href="<?= BASEURL; ?>" class="sidebar-item <?= ($data['page'] == 'home') ? 'active' : ' ' ?>"
                        class="sidebar-item" onclick="toggleActive(this)">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 15C15.866 15 19 11.866 19 8C19 4.13401 15.866 1 12 1C8.13401 1 5 4.13401 5 8C5 11.866 8.13401 15 12 15Z"
                                stroke="#7E8CAC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8.21 13.89L7 23L12 20L17 23L15.79 13.88" stroke="#7E8CAC" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span>Pesan Kamar</span>
                    </a>

                    <a href="<?= BASEURL; ?>/pemesanan/"
                        class="sidebar-item <?= ($data['judul'] == 'Pesanan Saya') ? 'active' : ' ' ?>"
                        onclick="toggleActive(this)">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 15C15.866 15 19 11.866 19 8C19 4.13401 15.866 1 12 1C8.13401 1 5 4.13401 5 8C5 11.866 8.13401 15 12 15Z"
                                stroke="#7E8CAC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8.21 13.89L7 23L12 20L17 23L15.79 13.88" stroke="#7E8CAC" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span>Pesanan saya</span>
                    </a>

                    <a href="<?= BASEURL; ?>/pengguna/keluar" class="sidebar-item" onclick="toggleActive(this)">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.36 6.64C19.6184 7.89879 20.4753 9.50244 20.8223 11.2482C21.1693 12.9939 20.9909 14.8034 20.3096 16.4478C19.6284 18.0921 18.4748 19.4976 16.9948 20.4864C15.5148 21.4752 13.7749 22.0029 11.995 22.0029C10.2151 22.0029 8.47515 21.4752 6.99517 20.4864C5.51519 19.4976 4.36164 18.0921 3.68036 16.4478C2.99909 14.8034 2.82069 12.9939 3.16772 11.2482C3.51475 9.50244 4.37162 7.89879 5.63 6.64"
                                stroke="#7E8CAC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 2V12" stroke="#7E8CAC" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <span>Log Out</span>
                    </a>
                    <?php endif; ?>
                    <?php else: ?>
                    <a href="<?= BASEURL; ?>" class="sidebar-item <?= ($data['page'] == 'home') ? 'active' : ' ' ?>"
                        onclick="toggleActive(this)">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 14H14V21H21V14Z" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M10 14H3V21H10V14Z" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M21 3H14V10H21V3Z" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M10 3H3V10H10V3Z" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <span>Home</span>
                    </a>
                    <a href="<?= BASEURL; ?>/pengguna/masuk"
                        class="sidebar-item <?= ($data['page'] == 'masuk') ? 'active' : ' ' ?>"
                        onclick="toggleActive(this)">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.36 6.64C19.6184 7.89879 20.4753 9.50244 20.8223 11.2482C21.1693 12.9939 20.9909 14.8034 20.3096 16.4478C19.6284 18.0921 18.4748 19.4976 16.9948 20.4864C15.5148 21.4752 13.7749 22.0029 11.995 22.0029C10.2151 22.0029 8.47515 21.4752 6.99517 20.4864C5.51519 19.4976 4.36164 18.0921 3.68036 16.4478C2.99909 14.8034 2.82069 12.9939 3.16772 11.2482C3.51475 9.50244 4.37162 7.89879 5.63 6.64"
                                stroke="#7E8CAC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 2V12" stroke="#7E8CAC" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <span>Log In</span>
                    </a>
                    <?php endif; ?>



                </div>
            </aside>

        </div>