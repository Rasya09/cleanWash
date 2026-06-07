@extends('user.layouts.app')

@section('content')
<style>
/* CSS for Tentang Kami Page */
.about-page {
    padding: 60px 20px;
    background-color: var(--blue-50);
    min-height: 80vh;
}
.about-header {
    text-align: center;
    margin-bottom: 50px;
}
.about-header h1 {
    font-size: 36px;
    font-weight: 700;
    color: var(--blue-primary);
    margin-bottom: 15px;
}
.about-header p {
    font-size: 16px;
    color: var(--text-muted);
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}
.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    max-width: 1100px;
    margin: 0 auto;
}
.team-card {
    background: #fff;
    border-radius: 16px;
    padding: 30px 20px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.team-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}
.team-avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 20px;
    object-fit: cover;
    background: var(--blue-100);
    border: 4px solid var(--blue-50);
}
.team-name {
    font-size: 20px;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 8px;
}
.team-role {
    font-size: 14px;
    color: var(--blue-primary);
    font-weight: 600;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.team-desc {
    font-size: 14px;
    color: var(--text-muted);
    line-height: 1.5;
}
@media (max-width: 600px) {
    .about-header h1 {
        font-size: 28px;
    }
    .about-page {
        padding: 40px 16px;
    }
}
</style>

<div class="about-page">
    <div class="about-header">
        <h1>Tentang Kami</h1>
        <p>Kenali tim di balik layar CleanWash yang berdedikasi tinggi untuk memberikan platform layanan laundry terbaik untuk Anda.</p>
    </div>

    <div class="team-grid">
        <!-- Anggota 1 -->
        <div class="team-card">
            <img src="https://ui-avatars.com/api/?name=A+1&background=0D8ABC&color=fff&size=150" alt="Anggota 1" class="team-avatar">
            <h3 class="team-name">Adzril Ilham Ramadhan</h3>
            <div class="team-role">Conflict Engineering</div>
            <p class="team-desc">Deskripsi singkat mengenai anggota tim ini dan perannya dalam pengembangan CleanWash.</p>
        </div>

        <!-- Anggota 2 -->
        <div class="team-card">
            <img src="https://ui-avatars.com/api/?name=A+2&background=0D8ABC&color=fff&size=150" alt="Anggota 2" class="team-avatar">
            <h3 class="team-name">Dwi Raysah Anandifa Kautsar</h3>
            <div class="team-role">Prompt Engineering</div>
            <p class="team-desc">Deskripsi singkat mengenai anggota tim ini dan perannya dalam pengembangan CleanWash.</p>
        </div>

        <!-- Anggota 3 -->
        <div class="team-card">
            <img src="https://ui-avatars.com/api/?name=A+3&background=0D8ABC&color=fff&size=150" alt="Anggota 3" class="team-avatar">
            <h3 class="team-name">M Rizal Nurfuadi</h3>
            <div class="team-role">cigarette Engineering</div>
            <p class="team-desc">Deskripsi singkat mengenai anggota tim ini dan perannya dalam pengembangan CleanWash.</p>
        </div>

        <!-- Anggota 4 -->
        <div class="team-card">
            <img src="https://ui-avatars.com/api/?name=A+4&background=0D8ABC&color=fff&size=150" alt="Anggota 4" class="team-avatar">
            <h3 class="team-name">Rasya Fadil Arfiano</h3>
            <div class="team-role">Sleepy Engineering</div>
            <p class="team-desc">Deskripsi singkat mengenai anggota tim ini dan perannya dalam pengembangan CleanWash.</p>
        </div>
    </div>
</div>
@endsection
