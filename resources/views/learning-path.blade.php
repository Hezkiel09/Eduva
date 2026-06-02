@extends('layouts.app')

@section('title', 'Learning Path - Eduva')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/learning-path.css') }}">
@endpush

<div class="page-container">
    <div class="lp-hero">
        <div class="lp-hero-content">
            <h1>Pilih Jalur <span>Belajar</span><br>Kamu!</h1>
            <p>Pilih jalur karier spesialis untuk memulai perjalanan vokasi personalmu. Kurikulum kami dibangun bekerja sama dengan pemimpin teknologi terbaik.</p>
        </div>
        
        <div class="lp-hero-graphic">
            <img src="{{ asset('img/learningpath/panah belakang foto orang.png') }}" class="lp-hero-arrow" alt="">
            <img src="{{ asset('img/learningpath/img gambar learn path.png') }}" class="lp-hero-person" alt="Student">
            <div class="lp-hero-floating">
                <div class="lp-floating-avatar">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&h=100&fit=crop&crop=faces" alt="Avatar">
                </div>
                <div class="lp-floating-text">
                    <div class="lp-floating-title">Network Engineer</div>
                    <div class="lp-floating-sub">& Web Developer</div>
                </div>
            </div>
            <img src="{{ asset('img/learningpath/elemen dibawah.png') }}" class="lp-hero-dots" alt="">
        </div>
    </div>

    <div class="lp-grid">
        <!-- Frontend -->
        <div class="lp-card">
            <div class="lp-card-img">
                <img src="{{ asset('img/learningpath/fe.png') }}" alt="Frontend Developer">
                <span class="lp-badge">Populer</span>
            </div>
            <div class="lp-card-body">
                <div class="lp-card-title">Frontend Developer</div>
                <div class="lp-card-desc">Kuasai seni membangun antarmuka pengguna yang responsif dan berperforma tinggi...</div>
                <div class="lp-card-footer">
                    <div class="lp-duration">⏱ 6-8 Bulan</div>
                    <a href="https://roadmap.sh/frontend" class="lp-btn">Pilih Jalur</a>
                </div>
            </div>
        </div>
        <!-- Backend -->
        <div class="lp-card">
            <div class="lp-card-img">
                <img src="{{ asset('img/learningpath/be.png') }}" alt="Backend Developer">
            </div>
            <div class="lp-card-body">
                <div class="lp-card-title">Backend Developer</div>
                <div class="lp-card-desc">Bangun sistem yang tangguh, API yang skalabel, dan arsitektur database yang aman...</div>
                <div class="lp-card-footer">
                    <div class="lp-duration">⏱ 6-8 Bulan</div>
                    <a href="https://roadmap.sh/backend" class="lp-btn">Pilih Jalur</a>
                </div>
            </div>
        </div>
        <!-- Cloud -->
        <div class="lp-card">
            <div class="lp-card-img">
                <img src="{{ asset('img/learningpath/cloud.png') }}" alt="Cloud Architect">
            </div>
            <div class="lp-card-body">
                <div class="lp-card-title">Cloud Architect</div>
                <div class="lp-card-desc">Rancang dan kelola infrastruktur cloud yang skalabel di AWS dan Azure untuk...</div>
                <div class="lp-card-footer">
                    <div class="lp-duration">⏱ 8-10 Bulan</div>
                    <a href="https://roadmap.sh/cloudflare" class="lp-btn">Pilih Jalur</a>
                </div>
            </div>
        </div>
        <!-- Data Science -->
        <div class="lp-card">
            <div class="lp-card-img">
                <img src="{{ asset('img/learningpath/datascience.png') }}" alt="Data Scientist">
            </div>
            <div class="lp-card-body">
                <div class="lp-card-title">Data Scientist</div>
                <div class="lp-card-desc">Temukan wawasan dari big data menggunakan Python, model Machine Learning,...</div>
                <div class="lp-card-footer">
                    <div class="lp-duration">⏱ 10-12 Bulan</div>
                    <a href="https://roadmap.sh/ai-data-scientist" class="lp-btn">Pilih Jalur</a>
                </div>
            </div>
        </div>
        <!-- UI/UX -->
        <div class="lp-card">
            <div class="lp-card-img">
                <img src="{{ asset('img/learningpath/uiux.png') }}" alt="Desainer UI/UX">
            </div>
            <div class="lp-card-body">
                <div class="lp-card-title">UI/UX Designer</div>
                <div class="lp-card-desc">Rancang tampilan aplikasi yang menarik, mudah digunakan, dan ciptakan prototipe interaktif yang berpusat pada pengguna...</div>
                <div class="lp-card-footer">
                    <div class="lp-duration">⏱ 5-7 Bulan</div>
                    <a href="https://roadmap.sh/ux-design" class="lp-btn">Pilih Jalur</a>
                </div>
            </div>
        </div>
        <!-- Cyber -->
        <div class="lp-card">
            <div class="lp-card-img">
                <img src="{{ asset('img/learningpath/cybersecurity.png') }}" alt="Cybersecurity">
            </div>
            <div class="lp-card-body">
                <div class="lp-card-title">Cybersecurity</div>
                <div class="lp-card-desc">Lindungi aset organisasi dengan menguasai ethical hacking, jaringan...</div>
                <div class="lp-card-footer">
                    <div class="lp-duration">⏱ 7-9 Bulan</div>
                    <a href="https://roadmap.sh/cyber-security" class="lp-btn">Pilih Jalur</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose -->
    <div class="why-section">
        <h2>Mengapa Memilih Jalur Spesialis?</h2>
        <div class="why-grid">
            <div class="why-item">
                <div class="why-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3>Selaras dengan Industri</h3>
                <p>Kurikulum dirancang bersama mitra teknologi Fortune 500 untuk memastikan kesiapan kerja sejak hari pertama.</p>
            </div>
            <div class="why-item">
                <div class="why-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2"></path></svg>
                </div>
                <h3>Sertifikasi Profesional</h3>
                <p>Dapatkan kredensial yang diakui industri untuk membuka peluang kerja premium.</p>
            </div>
            <div class="why-item">
                <div class="why-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3>Mentorship dari Ahli</h3>
                <p>Bimbingan 1-on-1 dari profesional yang telah membangun karier di Google, Amazon, dan Meta.</p>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="testi-section">
        <h2>Cerita Sukses Siswa</h2>
        <div class="testi-grid">
            <div class="testi-card">
                <div class="testi-author">
                    <div class="testi-avatar"></div>
                    <div class="testi-info">
                        <h4>Elena Rodriguez</h4>
                        <span>Cloud Architect at AWS</span>
                    </div>
                </div>
                <div class="testi-quote">"Proyek langsung dan mentorship di EDUVA memberi saya kepercayaan diri praktis yang saya butuhkan untuk beralih ke arsitektur cloud tingkat tinggi."</div>
            </div>
            <div class="testi-card">
                <div class="testi-author">
                    <div class="testi-avatar"></div>
                    <div class="testi-info">
                        <h4>Marcus Chen</h4>
                        <span>Senior Dev at Microsoft</span>
                    </div>
                </div>
                <div class="testi-quote">"Kurikulumnya sangat modern. Saya mendapati diri saya menggunakan alat di kelas yang sekarang saya gunakan setiap hari di Microsoft."</div>
            </div>
            <div class="testi-card">
                <div class="testi-author">
                    <div class="testi-avatar"></div>
                    <div class="testi-info">
                        <h4>Sarah Jenkins</h4>
                        <span>UX Lead at Google</span>
                    </div>
                </div>
                <div class="testi-quote">"EDUVA tidak hanya mengajarkan keterampilan; mereka mengajarkan cara berpikir seperti seorang profesional. Dukungan kariernya menjadi jembatan menuju pekerjaan impian saya."</div>
            </div>
</div>

<!-- Partners Banner (Full Width) -->
<div class="partners-banner">
    <img src="{{ asset('img/learningpath/course_above_footer.png') }}" alt="Course Partners">
</div>
@endsection
