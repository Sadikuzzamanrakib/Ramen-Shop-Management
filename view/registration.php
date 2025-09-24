<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Ramen Station • Register / Login</title>
    <link rel="stylesheet" href="../css/reg.css" />
</head>
<body>
  <div class="page">
    <header>
      <div class="brand">
        <div class="logo" aria-hidden="true"></div>
        <h1><span>Ramen</span> House</h1>
         <div class="home"><a href="index.php" id="homelink">Home</a></div> 
      </div>
    </header>

    <main>
      <div class="container">

        <section class="card">
          <nav class="tabs">
            <button class="tab-btn active" data-tab="register">Register</button>
            <button class="tab-btn" data-tab="login">Login</button>
          </nav>

          <!-- Register Panel -->
          <div id="panel-register" class="panel active">
            <form id="regForm" novalidate>
              <div class="row">
                <div class="field">
                  <label for="username">Username</label>
                  <input id="username" name="username" type="text" required minlength="3" maxlength="50" pattern="^[A-Za-z0-9_]+$" />
                  <small id="err-username" class="error"></small>
                </div>
              </div>

              <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" required maxlength="254" />
                <small id="err-email" class="error"></small>
              </div>

              <div class="field">
                <label for="pass">Password</label>
                <input id="pass" name="pass" type="password" required minlength="8" />
                <small id="err-pass" class="error"></small>
              </div>

              <div id="err-form" class="error"></div>
              <div id="ok" class="success"></div>

              <div class="actions">
                <button class="btn" type="submit">Create account</button>
                <span class="muted">Already have one? <a href="#" class="link tab-switch" data-tab="login">Login</a></span>
              </div>
            </form>
          </div>

          <!-- Login Panel (UI stub) -->
          <div id="panel-login" class="panel" >
            <form id="loginForm" action="../controller/userLoginController.php" method="POST">
              <div class="field">
                <label for="login-email">Email</label>
                <input id="login-email" name="email" type="email" required />
                <small class="error"><?= ($_SESSION['login']) ?></small>
              </div>

              <div class="field">
                <label for="login-pass">Password</label>
                <input id="login-pass" name="pass" type="password" required />
                <small class="error"><?= ($_SESSION['login']) ?></small>
              </div>

              <div class="actions">
                <button class="btn" type="submit" >Login</button>
                <span class="muted">New here? <a href="#" class="link tab-switch" data-tab="register">Register</a></span>
              </div>
            </form>
          </div>
        </section>
      </div>
    </main>

    <footer>© <span id="year"></span> Ramen Station</footer>
  </div>

  <script>
    // --- Tabs (toggle Register/Login) ---
    const tabs = document.querySelectorAll('.tab-btn, .tab-switch');
    const panels = {
      register: document.getElementById('panel-register'),
      login: document.getElementById('panel-login')
    };
    function switchTab(name) {
      document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.toggle('active', btn.dataset.tab === name));
      Object.entries(panels).forEach(([k, el]) => el.classList.toggle('active', k === name));
    }
    tabs.forEach(t => t.addEventListener('click', (e) => {
      e.preventDefault();
      switchTab(e.currentTarget.dataset.tab);
    }));

    // --- Register form AJAX (fetch + JSON) ---
    const form = document.getElementById('regForm');
    const show = (id, msg) => { const el = document.getElementById(id); if (el) el.textContent = msg || ''; };
    const mark = (name, hasError) => {
      const input = form.elements[name];
      if (!input) return;
      input.classList.toggle('error', !!hasError);
      input.setAttribute('aria-invalid', hasError ? 'true' : 'false');
    };

    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      // Clear previous messages
      ['username','email','pass'].forEach(n => { show('err-'+n,''); mark(n,false); });
      show('err-form',''); show('ok','');

      const fd = new FormData(form);

      let res;
      try {
        // IMPORTANT: adjust the path if your controller lives elsewhere
        res = await fetch('../controller/regcontroller.php', { method: 'POST', body: fd });
      } catch (err) {
        show('err-form', 'Network error. Is Apache running? Is the URL correct?');
        console.error('Fetch error:', err);
        return;
      }

      let data;
      try {
        data = await res.json();
      } catch (err) {
        const raw = await res.text().catch(() => '');
        console.error('JSON parse error:', err, 'Raw:', raw);
        show('err-form', 'Server returned an invalid response.');
        return;
      }

      if (!res.ok || !data.ok) {
        const errs = data.errors || {};
        if (errs.username) { show('err-username', errs.username); mark('username', true); }
        if (errs.email)    { show('err-email',    errs.email);    mark('email', true); }
        if (errs.pass)     { show('err-pass',     errs.pass);     mark('pass', true); }
        if (errs.form)     { show('err-form',     errs.form); }
        const first = ['username','email','pass'].find(n => errs[n]);
        if (first) form.elements[first].focus();
        return;
      }

      show('ok', 'Registration successful! Welcome to Ramen Station 🍜');
      form.reset();
    });

    // footer year
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
</body>
</html>