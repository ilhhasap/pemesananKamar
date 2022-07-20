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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

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
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-people" viewBox="0 0 16 16">
                            <path
                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bookmark-star" viewBox="0 0 16 16">
                            <path
                                d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z" />
                            <path
                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-send" viewBox="0 0 16 16">
                            <path
                                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                        </svg>

                        <span>Pesan Kamar</span>
                    </a>

                    <a href="<?= BASEURL; ?>/pemesanan/"
                        class="sidebar-item <?= ($data['judul'] == 'Pesanan Saya') ? 'active' : ' ' ?>"
                        onclick="toggleActive(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bookmarks" viewBox="0 0 16 16">
                            <path
                                d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z" />
                            <path
                                d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z" />
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                            <path fill-rule="evenodd"
                                d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>

                        <span>Log In</span>
                    </a>
                    <?php endif; ?>



                </div>
            </aside>

        </div>