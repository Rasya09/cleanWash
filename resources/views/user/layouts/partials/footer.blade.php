<style>
/* ===== FOOTER ===== */
footer.site-footer {
    background: var(--blue-primary);
    padding: 64px 40px 28px;
    color: #fff;
    width: 100%;
    box-sizing: border-box;
    overflow-x: hidden;
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
    flex-shrink: 0;
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
.footer-socials { display: flex; gap: 8px; margin-top: 4px; flex-wrap: wrap; }
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
.footer-links { display: flex; gap: 24px; flex-wrap: wrap; }

/* ===== FOOTER RESPONSIVE ===== */
@media (max-width: 768px) {
    footer.site-footer {
        padding: 40px 24px 24px;
    }
    .footer-top {
        grid-template-columns: 1fr 1fr;
        gap: 32px;
        padding-bottom: 32px;
    }
    .footer-brand {
        grid-column: 1 / -1; /* brand span full width */
    }
    .footer-brand-desc {
        max-width: 100%;
    }
}

@media (max-width: 480px) {
    footer.site-footer {
        padding: 32px 16px 20px;
    }
    .footer-top {
        grid-template-columns: 1fr;
        gap: 24px;
        padding-bottom: 24px;
    }
    .footer-brand {
        grid-column: auto;
    }
    .footer-brand-desc {
        font-size: 13px;
    }
    .footer-link-row {
        font-size: 13px;
    }
    .footer-bottom {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        padding-top: 20px;
    }
    .footer-links {
        gap: 16px;
    }
}
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
        <!-- Instagram -->
        <a href="#" class="social-btn" aria-label="Instagram">
          <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
        </a>
        <!-- Github -->
        <a href="#" class="social-btn" aria-label="GitHub">
          <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
        </a>
        <!-- Tiktok -->
        <a href="#" class="social-btn" aria-label="TikTok">
          <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
        </a>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2026 CleanWash. All rights reserved.</span>
    <div class="footer-links">
      <a href="{{ route('tentang.kami') }}" style="color:#fff; text-decoration:underline; font-weight:600; text-underline-offset:4px;">Tentang Kami</a>
      <span>Kebijakan Privasi</span>
      <span>Syarat &amp; Ketentuan</span>
    </div>
  </div>
</footer>
