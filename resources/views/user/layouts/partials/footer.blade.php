<style>
/* ===== FOOTER ===== */
footer.site-footer {
    background: var(--blue-primary);
    padding: 64px 40px 28px;
    color: #fff;
}
.footer-top {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 64px;
    padding-bottom: 48px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}
.footer-brand-logo {
    display: flex; align-items: center;
    gap: 9px; margin-bottom: 12px;
}
.footer-logo-icon {
    width: 32px; height: 32px;
    border-radius: 9px;
    background: rgba(255,255,255,0.15);
    display: flex; align-items: center; justify-content: center;
    font-size: 16px;
}
.footer-brand-name {
    font-family: 'Bricolage Grotesque', sans-serif;
    font-size: 17px; font-weight: 700;
    letter-spacing: 0.5px;
}
.footer-brand-desc {
    font-size: 14px; line-height: 1.7;
    color: rgba(255,255,255,0.65);
    max-width: 260px;
}
.footer-col-title {
    font-family: 'Bricolage Grotesque', sans-serif;
    font-size: 14px; font-weight: 600;
    letter-spacing: 0.28px;
    margin-bottom: 10px;
}
.footer-link-row {
    display: flex; align-items: center;
    gap: 7px; font-size: 13.5px;
    color: rgba(255,255,255,0.7);
    margin-bottom: 8px;
}
.footer-socials { display: flex; gap: 8px; margin-top: 4px; }
.social-btn {
    width: 36px; height: 36px;
    border-radius: 9px;
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.1);
    color: #fff;
    font-size: 13px; font-weight: 600;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer;
    transition: background 0.2s;
}
.social-btn:hover { background: rgba(255,255,255,0.15); }
.footer-bottom {
    display: flex; align-items: center;
    justify-content: space-between;
    flex-wrap: wrap; gap: 12px;
    padding-top: 28px;
    font-size: 13px; color: rgba(255,255,255,0.5);
}
.footer-links { display: flex; gap: 24px; }
</style>
<!-- ===== FOOTER ===== -->
<footer class="site-footer">
  <div class="footer-top">
    <div class="footer-brand">
      <div class="footer-brand-logo">
        <div class="footer-logo-icon">🫧</div>
        <span class="footer-brand-name">CleanWash</span>
      </div>
      <p class="footer-brand-desc">Platform digital yang membantu Anda menemukan layanan laundry terpercaya dengan mudah dan praktis.</p>
    </div>
    <div>
      <div class="footer-col-title">Kontak Kami</div>
      <div class="footer-link-row"><span>✉️</span> cleanwash@gmail.com</div>
      <div class="footer-link-row"><span>📞</span> +62-8881-0102</div>
    </div>
    <div>
      <div class="footer-col-title">Ikuti Kami</div>
      <div class="footer-socials">
        <div class="social-btn">f</div>
        <div class="social-btn">ig</div>
        <div class="social-btn">tt</div>
        <div class="social-btn">x</div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2026 CleanWash. All rights reserved.</span>
    <div class="footer-links">
      <span>Kebijakan Privasi</span>
      <span>Syarat &amp; Ketentuan</span>
    </div>
  </div>
</footer>