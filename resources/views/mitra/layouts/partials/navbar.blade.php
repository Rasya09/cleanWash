<style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --primary: #2563eb;
    --primary-light: #eff6ff;
    --primary-mid: #bfdbfe;
    --secondary: #14b8a6;
    --secondary-light: #f0fdfa;
    --neutral: #111827;
    --neutral-500: #6b7280;
    --neutral-300: #d1d5db;
    --neutral-100: #f3f4f6;
    --neutral-50: #f9fafb;
    --success: #22c55e;
    --success-light: #f0fdf4;
    --warning: #ffd400;
    --warning-light: #fefce8;
    --error: #ef4444;
    --error-light: #fef2f2;
    --white: #ffffff;
    --sidebar-width: 224px;
    --header-height: 64px;
    --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
    --shadow-md: 0 4px 12px rgba(0,0,0,0.08);
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
  }

  body {
    font-family: 'Poppins', sans-serif;
    background: #f1f5f9;
    color: var(--neutral);
    font-size: 14px;
    display: flex;
    min-height: 100vh;
  }

  

  /* ── MAIN LAYOUT ── */
  .main-wrapper {
    margin-left: var(--sidebar-width);
    flex: 1;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }
    /* ── HEADER ── */
  .header {
    height: var(--header-height);
    background: var(--white);
    border-bottom: 1px solid var(--neutral-100);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 24px;
    position: sticky; top: 0;
    z-index: 50;
  }

  .header-title {
    font-size: 20px; font-weight: 700; color: var(--neutral);
    display: flex; align-items: center; gap: 12px;
  }

  .hamburger {
    width: 32px; height: 32px;
    display: flex; flex-direction: column;
    justify-content: center; gap: 5px;
    cursor: pointer;
  }

  .hamburger span {
    display: block; height: 2px;
    background: var(--neutral-500);
    border-radius: 2px;
    width: 100%;
  }

  .header-right {
    display: flex; align-items: center; gap: 16px;
  }

  .notif-btn {
    position: relative;
    width: 38px; height: 38px;
    border-radius: 50%;
    border: 1px solid var(--neutral-100);
    background: var(--white);
    display: flex; align-items: center; justify-content: center;
    cursor: pointer;
    font-size: 18px;
  }

  .notif-badge {
    position: absolute; top: 2px; right: 2px;
    width: 16px; height: 16px;
    background: var(--error);
    border-radius: 50%;
    font-size: 9px; font-weight: 700;
    color: white;
    display: flex; align-items: center; justify-content: center;
  }

  .store-info {
    display: flex; align-items: center; gap: 10px;
    padding: 6px 12px;
    border: 1px solid var(--neutral-100);
    border-radius: 10px;
    cursor: pointer;
  }

  .store-avatar {
    width: 32px; height: 32px;
    background: linear-gradient(135deg, #e0f2fe, #eff6ff);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px;
  }

  .store-name { font-size: 13px; font-weight: 600; }
  .store-role { font-size: 11px; color: var(--neutral-500); }
  .chevron { color: var(--neutral-500); font-size: 12px; }
</style>

<header class="header">
    <div class="header-title">
      <div class="hamburger">
        <span></span><span></span><span></span>
      </div>
      Dashboard
    </div>
    <div class="header-right">
      <div class="notif-btn">
        🔔
        <div class="notif-badge">3</div>
      </div>
      <div class="store-info">
        <div class="store-avatar">🏪</div>
        <div>
          <div class="store-name">Laundry Bersih</div>
          <div class="store-role">Mitra</div>
        </div>
        <span class="chevron">▾</span>
      </div>
    </div>
  </header>