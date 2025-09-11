<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Ramen Station • Register / Login</title>
  <style>
    :root {
      --accent: #ff4500;           /* your color */
      --bg: #fffaf7;
      --ink: #222;
      --muted: #666;
      --card: #ffffff;
      --border: #eee;
      --ok: #0a7f27;
      --err: #b00020;
      --radius: 14px;
      --shadow: 0 8px 20px rgba(0,0,0,.06);
    }

    /* --- Page frame (nested layout: page -> container -> sections) --- */
    body {
      margin: 0;
      font: 16px/1.5 system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji","Segoe UI Emoji";
      color: var(--ink);
      background: radial-gradient(1200px 600px at 20% -5%, #ffe1d3 0%, transparent 60%), var(--bg);
    }

    .page {
      min-height: 100svh;
      display: grid;
      grid-template-rows: auto 1fr auto;
    }

    /* --- Header --- */
    header {
      padding: 16px clamp(16px, 4vw, 32px);
      border-bottom: 1px solid var(--border);
      background: #fff;
      position: sticky;
      top: 0;
      z-index: 2;
    }
    .brand {
      display: flex;
      align-items:center;
      gap: 12px;
      max-width: 1100px;
      margin: 0 auto;
    }
    .logo {
      inline-size: 40px; block-size: 40px;
      border-radius: 10px;
      background: var(--accent);
      box-shadow: inset 0 0 0 4px #fff, var(--shadow);
    }
    .brand h1 {
      font-size: 20px; margin: 0;
      letter-spacing: .5px; text-transform: uppercase;
    }
    .brand h1 span { color: var(--accent); }

    /* --- Main content area --- */
    main {
      padding: clamp(16px, 4vw, 32px);
    }
    .container {
      max-width: 1100px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1.1fr .9fr; /* grid */
      gap: clamp(16px, 4vw, 32px);
      align-items: start;
    }
    @media (max-width: 900px) {
      .container { grid-template-columns: 1fr; }
    }

    /* --- Left: Intro / hero card --- */
    .intro {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: clamp(16px, 4vw, 28px);
      box-shadow: var(--shadow);
      display: grid; gap: 12px;
    }
    .intro h2 {
      margin: 0 0 4px; font-size: clamp(20px, 2.2vw, 28px);
    }
    .intro p { color: var(--muted); margin: 0; }
    .badges { display:flex; gap:10px; flex-wrap: wrap; margin-top: 10px; }
    .badge {
      padding: 6px 10px; border-radius: 999px;
      background: #fff5f0; color: var(--accent);
      border: 1px solid #ffd2c2; font-size: 13px;
    }
    .hero {
      margin-top: 10px;
      border-radius: 12px;
      background:
        linear-gradient(135deg, rgba(255,69,0,.08), rgba(255,69,0,.02)),
        repeating-linear-gradient(45deg, #fff, #fff 10px, #fffaf7 10px, #fffaf7 20px);
      min-height: 160px;
      border: 1px dashed #ffd2c2;
      display:flex; align-items:center; justify-content:center;
      color: var(--muted);
      font-size: 14px;
    }

    /* --- Right: Auth card with tabs (nested layout inside card) --- */
    .card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow: hidden;
      display: grid;
      grid-template-rows: auto 1fr;
      min-height: 420px;
    }

    .tabs {
      display: flex;
      background: #fff7f3;
      border-bottom: 1px solid var(--border);
    }
    .tab-btn {
      flex: 1;
      padding: 14px 16px;
      font-weight: 600;
      text-align: center;
      cursor: pointer;
      border: 0;
      background: transparent;
      color: var(--muted);
    }
    .tab-btn.active {
      color: var(--accent);
      border-bottom: 3px solid var(--accent);
      background: #fff;
    }

    .panel {
      padding: clamp(16px, 4vw, 24px);
      display: none;
    }
    .panel.active { display: block; }

    /* --- Forms (flex layout) --- */
    form {
      display: grid; gap: 12px;
    }
    .field {
      display: grid; gap: 6px;
    }
    label {
      font-weight: 600; font-size: 14px;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"]{
      padding: 12px 14px;
      border: 1px solid var(--border);
      border-radius: 10px;
      outline: none;
      transition: border-color .15s ease, box-shadow .15s ease;
      background: #fff;
    }
    input:focus {
      border-color: #ffc1ad;
      box-shadow: 0 0 0 4px #fff0ea;
    }
    input.error {
      border-color: var(--err);
      box-shadow: 0 0 0 4px rgba(176,0,32,.08);
    }

    .error { color: var(--err); font-size: 13px; min-height: 1em; }
    .success { color: var(--ok); font-weight: 600; margin-top: 8px; }

    .row {
      display: flex; gap: 12px; /* flex */
    }
    .row > * { flex: 1; }

    .actions {
      display: flex; align-items: center; gap: 12px; margin-top: 6px;
    }
    .btn {
      appearance: none; border: 0; cursor: pointer;
      padding: 12px 16px; border-radius: 10px;
      background: var(--accent); color: #fff;
      font-weight: 700; letter-spacing: .2px;
      box-shadow: 0 6px 14px rgba(255,69,0,.25);
    }
    .link {
      color: var(--accent); text-decoration: none; font-weight: 600;
    }
    .muted { color: var(--muted); font-size: 14px; }

    /* --- Footer --- */
    footer {
      padding: 20px; text-align: center; color: var(--muted);
    }
  </style>
</head>
<body>
  <div class="page">
    <header>
      <div class="brand">
        <div class="logo" aria-hidden="true"></div>
        <h1><span>Ramen</span> Station</h1>
      </div>
    </header>

    <main>
      <div class="container">
        <!-- LEFT: intro / marketing copy -->
        <section class="intro">
          <h2>Slurp-worthy bowls, crafted fresh.</h2>
          <p>Join Ramen Station to save your favourites, track orders, and get spicy perks.</p>
          <div class="badges">
            <span class="badge">🍜 Handmade noodles</span>
            <span class="badge">🔥 Signature Tantanmen</span>
            <span class="badge">🌶️ Level your spice</span>
            <span class="badge">⏱️ Quick pickup</span>
          </div>
          <div class="hero">Chef’s sketch space (add an image later)</div>
        </section>

        <!-- RIGHT: card with tabs -->
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
          <div id="panel-login" class="panel">
            <form id="loginForm" novalidate>
              <div class="field">
                <label for="login-email">Email</label>
                <input id="login-email" name="email" type="email" required />
                <small class="error"></small>
              </div>

              <div class="field">
                <label for="login-pass">Password</label>
                <input id="login-pass" name="pass" type="password" required />
                <small class="error"></small>
              </div>

              <div class="actions">
                <button class="btn" type="button" disabled>Login (coming soon)</button>
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