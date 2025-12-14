<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk & Daftar | BrownyGift Florist</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
</head>

<body>

    <div class="flower-bg">
        <div class="flower">🌸</div>
        <div class="flower">🌸</div>
        <div class="flower">🌸</div>
        <div class="flower">🌸</div>
        <div class="flower">🌸</div>
        <div class="flower">🌸</div>
        <div class="flower">🌸</div>
        <div class="flower">🌸</div>
    </div>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="<?php echo e(route('register.post')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <h1 style="color: #ec4899; margin-bottom: 10px;">Buat Akun</h1>
                <span>Daftar untuk mulai memesan buket bunga</span>

                <input type="text" name="nama" placeholder="Nama Lengkap" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="no_hp" placeholder="Nomor WhatsApp" required>

                <div class="password-wrapper">
                    <input type="password" name="password" id="password_reg" placeholder="Password" required>
                    <div class="toggle-password" onclick="togglePass('password_reg', this)">
                        <svg class="eye-open hidden" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 9a3 3 0 1 0 0 6 3 3 0 1 0 0-6"></path>
                            <path d="M12 19c7.63 0 9.93-6.62 9.95-6.68.07-.21.07-.43 0-.63-.02-.07-2.32-6.68-9.95-6.68s-9.93 6.61-9.95 6.67c-.07.21-.07.43 0 .63.02.07 2.32 6.68 9.95 6.68Zm0-12c5.35 0 7.42 3.85 7.93 5-.5 1.16-2.58 5-7.93 5s-7.42-3.84-7.93-5c.5-1.16 2.58-5 7.93-5"></path>
                        </svg>
                        <svg class="eye-closed" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17c-5.35 0-7.42-3.84-7.93-5 .2-.46.65-1.34 1.45-2.23l-1.4-1.4c-1.49 1.65-2.06 3.28-2.08 3.31-.07.21-.07.43 0 .63.02.07 2.32 6.68 9.95 6.68.91 0 1.73-.1 2.49-.26l-1.77-1.77c-.24.02-.47.03-.72.03ZM21.95 12.32c.07-.21.07-.43 0-.63-.02-.07-2.32-6.68-9.95-6.68-1.84 0-3.36.39-4.61.97L2.71 1.29 1.3 2.7l4.32 4.32 1.42 1.42 2.27 2.27 3.98 3.98 1.8 1.8 1.53 1.53 4.68 4.68 1.41-1.41-4.32-4.32c2.61-1.95 3.55-4.61 3.56-4.65m-7.25.97c.19-.39.3-.83.3-1.29 0-1.64-1.36-3-3-3-.46 0-.89.11-1.29.3l-1.8-1.8c.88-.31 1.9-.5 3.08-.5 5.35 0 7.42 3.85 7.93 5-.3.69-1.18 2.33-2.96 3.55z"></path>
                        </svg>
                    </div>
                </div>

                <button type="submit">Daftar</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form action="<?php echo e(url('/login')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <h1 style="color: #ec4899;">Browny<span style="color: #333;">Gift</span></h1>
                <p>Silahkan masuk ke akun Anda</p>

                <input type="email" name="email" placeholder="Email" required>

                <div class="password-wrapper">
                    <input type="password" name="password" id="password_login" placeholder="Password" required>
                    <div class="toggle-password" onclick="togglePass('password_login', this)">
                        <svg class="eye-open hidden" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 9a3 3 0 1 0 0 6 3 3 0 1 0 0-6"></path>
                            <path d="M12 19c7.63 0 9.93-6.62 9.95-6.68.07-.21.07-.43 0-.63-.02-.07-2.32-6.68-9.95-6.68s-9.93 6.61-9.95 6.67c-.07.21-.07.43 0 .63.02.07 2.32 6.68 9.95 6.68Zm0-12c5.35 0 7.42 3.85 7.93 5-.5 1.16-2.58 5-7.93 5s-7.42-3.84-7.93-5c.5-1.16 2.58-5 7.93-5"></path>
                        </svg>
                        <svg class="eye-closed" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17c-5.35 0-7.42-3.84-7.93-5 .2-.46.65-1.34 1.45-2.23l-1.4-1.4c-1.49 1.65-2.06 3.28-2.08 3.31-.07.21-.07.43 0 .63.02.07 2.32 6.68 9.95 6.68.91 0 1.73-.1 2.49-.26l-1.77-1.77c-.24.02-.47.03-.72.03ZM21.95 12.32c.07-.21.07-.43 0-.63-.02-.07-2.32-6.68-9.95-6.68-1.84 0-3.36.39-4.61.97L2.71 1.29 1.3 2.7l4.32 4.32 1.42 1.42 2.27 2.27 3.98 3.98 1.8 1.8 1.53 1.53 4.68 4.68 1.41-1.41-4.32-4.32c2.61-1.95 3.55-4.61 3.56-4.65m-7.25.97c.19-.39.3-.83.3-1.29 0-1.64-1.36-3-3-3-.46 0-.89.11-1.29.3l-1.8-1.8c.88-.31 1.9-.5 3.08-.5 5.35 0 7.42 3.85 7.93 5-.3.69-1.18 2.33-2.96 3.55z"></path>
                        </svg>
                    </div>
                </div>

                <button type="submit">Masuk</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Sudah Punya Akun?</h1>
                    <p>Yuk masuk untuk melihat koleksi bunga terbaru kami</p>
                    <button id="login_toggle">Masuk</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Halo, Sahabat!</h1>
                    <p>Ingin kirim hadiah ke orang tersayang? Daftar dulu yuk!</p>
                    <button id="register_toggle">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const container = document.getElementById("container");
        const registerBtn = document.getElementById("register_toggle");
        const loginBtn = document.getElementById("login_toggle");

        registerBtn.addEventListener("click", () => container.classList.add("active"));
        loginBtn.addEventListener("click", () => container.classList.remove("active"));

        function togglePass(inputId, element) {
            const passwordInput = document.getElementById(inputId);
            const eyeOpen = element.querySelector('.eye-open');
            const eyeClosed = element.querySelector('.eye-closed');

            if (passwordInput.type === "password") {
                // Tampilkan Teks
                passwordInput.type = "text";
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            } else {
                // Sembunyikan Teks
                passwordInput.type = "password";
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            }
        }
    </script>
</body>

</html><?php /**PATH C:\laragon\www\PROJECTPWEB_K11\resources\views/login.blade.php ENDPATH**/ ?>