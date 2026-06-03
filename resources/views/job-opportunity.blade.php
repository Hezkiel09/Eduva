@extends('layouts.app')

@section('title', 'Peluang Karir - Eduva')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/job-opportunity.css') }}">
@endpush

<div class="jo-hero">
    <div class="jo-hero-overlay"></div>
    <div class="page-container jo-hero-content">
        <h1>Temukan Peluang Karir Terbaikmu</h1>
        <p>Terhubung dengan para pemimpin industri dan temukan pekerjaan impian yang disesuaikan dengan hasil asesmen minat bakatmu.</p>
        <div class="jo-hero-search">
            <input type="text" id="hero-search" placeholder="Cari lowongan, magang, atau perusahaan...">
            <button id="hero-search-btn">Cari</button>
        </div>
    </div>
</div>

<div class="page-container jo-main-container">
    <div class="jo-filters-bar">
        <div class="jo-search-wrapper">
            <svg class="jo-search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input type="text" id="filter-search" placeholder="Cari lowongan, magang, atau perusahaan...">
        </div>
        
        <div class="jo-dropdowns">
            <div class="jo-select-wrapper">
                <select id="filter-type">
                    <option value="" selected>Semua Tipe Pekerjaan</option>
                    <option value="full-time">Penuh Waktu (Full-time)</option>
                    <option value="magang">Magang (Internship)</option>
                </select>
            </div>
            
            <div class="jo-select-wrapper">
                <select id="filter-location">
                    <option value="" selected>Semua Lokasi</option>
                    <option value="jakarta">Jakarta</option>
                    <option value="remote">Bekerja Remote</option>
                    <option value="hybrid">Hybrid (WFO/WFH)</option>
                </select>
            </div>

            <div class="jo-select-wrapper">
                <select id="filter-salary">
                    <option value="" selected>Semua Gaji</option>
                    <option value="2.5-5">Rp2.5 Juta - Rp5 Juta</option>
                    <option value="5-10">Rp5 Juta - Rp12 Juta</option>
                    <option value="10-20">Rp10 Juta - Rp20 Juta</option>
                    <option value="20-plus">> Rp20 Juta</option>
                </select>
            </div>
        </div>

        <button class="jo-filter-btn" onclick="resetFilters()">
            <span>Atur Ulang</span>
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <div class="jo-grid">
        <div class="jo-card" data-title="UI/UX Designer Intern" data-company="Tokopedia" data-type="magang" data-location="hybrid jakarta" data-salary-min="2500000" data-salary-max="4000000" data-tags="figma design thinking">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-tokopedia">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                        <polyline points="2 17 12 22 22 17"></polyline>
                        <polyline points="2 12 12 17 22 12"></polyline>
                    </svg>
                </div>

            </div>
            <div class="jo-card-body">
                <h3>UI/UX Designer Intern</h3>
                <div class="jo-company-info">Tokopedia • Jakarta (Hybrid)</div>
                <div class="jo-salary">Rp2.5 Juta - Rp4 Juta <span class="jo-period">/ bulan</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">Figma</span>
                    <span class="jo-tag">Design Thinking</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="https://www.tokopedia.com/careers" target="_blank" rel="noopener noreferrer" class="jo-details-btn">Lihat Detail</a>
            </div>
        </div>

        <div class="jo-card" data-title="Product Management Trainee" data-company="Gojek" data-type="full-time" data-location="remote" data-salary-min="8000000" data-salary-max="12000000" data-tags="agile analisis data">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-gojek">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    </svg>
                </div>

            </div>
            <div class="jo-card-body">
                <h3>Product Management Trainee</h3>
                <div class="jo-company-info">Gojek • Remote</div>
                <div class="jo-salary">Rp8 Juta - Rp12 Juta <span class="jo-period">/ bulan</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">Agile</span>
                    <span class="jo-tag">Analisis Data</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="https://www.gojek.com/careers" target="_blank" rel="noopener noreferrer" class="jo-details-btn">Lihat Detail</a>
            </div>
        </div>

        <div class="jo-card" data-title="Junior Frontend Developer" data-company="Traveloka" data-type="full-time" data-location="jakarta" data-salary-min="6500000" data-salary-max="9000000" data-tags="react.js javascript">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-traveloka">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                </div>

            </div>
            <div class="jo-card-body">
                <h3>Junior Frontend Developer</h3>
                <div class="jo-company-info">Traveloka • Jakarta</div>
                <div class="jo-salary">Rp6.5 Juta - Rp9 Juta <span class="jo-period">/ bulan</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">React.js</span>
                    <span class="jo-tag">JavaScript</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="https://www.traveloka.com/en-id/careers" target="_blank" rel="noopener noreferrer" class="jo-details-btn">Lihat Detail</a>
            </div>
        </div>

        <div class="jo-card" data-title="Mobile App Developer" data-company="Grab" data-type="full-time" data-location="remote" data-salary-min="10000000" data-salary-max="15000000" data-tags="flutter dart">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-grab">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                </div>

            </div>
            <div class="jo-card-body">
                <h3>Mobile App Developer</h3>
                <div class="jo-company-info">Grab • Remote</div>
                <div class="jo-salary">Rp10 Juta - Rp15 Juta <span class="jo-period">/ bulan</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">Flutter</span>
                    <span class="jo-tag">Dart</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="https://grab.careers" target="_blank" rel="noopener noreferrer" class="jo-details-btn">Lihat Detail</a>
            </div>
        </div>

        <div class="jo-card" data-title="Data Analyst Intern" data-company="Shopee" data-type="magang" data-location="jakarta" data-salary-min="3000000" data-salary-max="5000000" data-tags="python sql">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-shopee">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="20" x2="18" y2="10"></line>
                        <line x1="12" y1="20" x2="12" y2="4"></line>
                        <line x1="6" y1="20" x2="6" y2="14"></line>
                    </svg>
                </div>

            </div>
            <div class="jo-card-body">
                <h3>Data Analyst Intern</h3>
                <div class="jo-company-info">Shopee • Jakarta</div>
                <div class="jo-salary">Rp3 Juta - Rp5 Juta <span class="jo-period">/ bulan</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">Python</span>
                    <span class="jo-tag">SQL</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="https://careers.shopee.co.id" target="_blank" rel="noopener noreferrer" class="jo-details-btn">Lihat Detail</a>
            </div>
        </div>

        <div class="jo-card" data-title="Backend Engineer" data-company="Tiket.com" data-type="full-time" data-location="remote" data-salary-min="12000000" data-salary-max="18000000" data-tags="node.js go">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-tiket">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    </svg>
                </div>

            </div>
            <div class="jo-card-body">
                <h3>Backend Engineer</h3>
                <div class="jo-company-info">Tiket.com • Remote</div>
                <div class="jo-salary">Rp12 Juta - Rp18 Juta <span class="jo-period">/ bulan</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">Node.js</span>
                    <span class="jo-tag">Go</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="https://www.tiket.com/careers" target="_blank" rel="noopener noreferrer" class="jo-details-btn">Lihat Detail</a>
            </div>
        </div>

        <div class="jo-card" data-title="Cloud Solutions Architect" data-company="AWS" data-type="full-time" data-location="jakarta" data-salary-min="15000000" data-salary-max="25000000" data-tags="aws infrastruktur">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-aws">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                </div>

            </div>
            <div class="jo-card-body">
                <h3>Cloud Solutions Architect</h3>
                <div class="jo-company-info">AWS • Jakarta</div>
                <div class="jo-salary">Rp15 Juta - Rp25 Juta <span class="jo-period">/ bulan</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">AWS</span>
                    <span class="jo-tag">Infrastruktur</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="https://www.amazon.jobs" target="_blank" rel="noopener noreferrer" class="jo-details-btn">Lihat Detail</a>
            </div>
        </div>

        <div class="jo-card" data-title="Cybersecurity Analyst" data-company="BCA" data-type="full-time" data-location="hybrid" data-salary-min="10000000" data-salary-max="18000000" data-tags="keamanan jaringan pen testing">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-bca">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="10" rx="2" ry="2"></rect>
                        <path d="M12 2a5 5 0 0 0-5 5v4h10V7a5 5 0 0 0-5-5z"></path>
                    </svg>
                </div>

            </div>
            <div class="jo-card-body">
                <h3>Cybersecurity Analyst</h3>
                <div class="jo-company-info">BCA • Hybrid</div>
                <div class="jo-salary">Rp10 Juta - Rp18 Juta <span class="jo-period">/ bulan</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">Keamanan Jaringan</span>
                    <span class="jo-tag">Pen Testing</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="https://karir.bca.co.id" target="_blank" rel="noopener noreferrer" class="jo-details-btn">Lihat Detail</a>
            </div>
        </div>

        <div class="jo-card" data-title="Machine Learning Engineer" data-company="Bukalapak" data-type="full-time" data-location="remote" data-salary-min="12000000" data-salary-max="20000000" data-tags="python tensorflow">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-bukalapak">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                </div>

            </div>
            <div class="jo-card-body">
                <h3>Machine Learning Engineer</h3>
                <div class="jo-company-info">Bukalapak • Remote</div>
                <div class="jo-salary">Rp12 Juta - Rp20 Juta <span class="jo-period">/ bulan</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">Python</span>
                    <span class="jo-tag">TensorFlow</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="https://careers.bukalapak.com" target="_blank" rel="noopener noreferrer" class="jo-details-btn">Lihat Detail</a>
            </div>
        </div>

        <div class="jo-empty-state" id="jo-empty-state" style="display: none; grid-column: 1 / -1; text-align: center; padding: 60px 20px; background: #ffffff; border-radius: 24px; border: 1.5px dashed #E2E8F0; margin-top: 10px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 16px; display: inline-block;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
            <h3 style="font-size: 16.5px; font-weight: 800; color: #0F172A; margin: 0 0 6px 0;">Lowongan tidak ditemukan</h3>
            <p style="color: #64748B; font-size: 13.5px; margin: 0 0 20px 0; font-weight: 500;">Silakan ubah kata kunci atau setelan filter Anda untuk menemukan peluang karir yang sesuai.</p>
            <button type="button" class="btn-hero-solid" onclick="resetFilters()" style="background: #2563EB; color: white; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 700; cursor: pointer; font-size: 13.5px;">Atur Ulang Filter</button>
        </div>
    </div>


</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const heroSearch = document.getElementById('hero-search');
        const heroSearchBtn = document.getElementById('hero-search-btn');
        const filterSearch = document.getElementById('filter-search');
        const filterType = document.getElementById('filter-type');
        const filterLocation = document.getElementById('filter-location');
        const filterSalary = document.getElementById('filter-salary');
        const cards = document.querySelectorAll('.jo-card');
        const emptyState = document.getElementById('jo-empty-state');

        function filterJobs() {
            const query = filterSearch.value.toLowerCase().trim();
            const type = filterType.value;
            const location = filterLocation.value;
            const salary = filterSalary.value;
            let visibleCount = 0;

            cards.forEach(card => {
                const title = card.getAttribute('data-title').toLowerCase();
                const company = card.getAttribute('data-company').toLowerCase();
                const cardType = card.getAttribute('data-type');
                const cardLocation = card.getAttribute('data-location').toLowerCase();
                const cardSalaryMin = parseInt(card.getAttribute('data-salary-min'));
                const cardSalaryMax = parseInt(card.getAttribute('data-salary-max'));
                const tags = card.getAttribute('data-tags').toLowerCase();

                const matchesQuery = !query || 
                    title.includes(query) || 
                    company.includes(query) || 
                    tags.includes(query);

                const matchesType = !type || cardType === type;

                const matchesLocation = !location || 
                    (location === 'jakarta' && cardLocation.includes('jakarta')) ||
                    (location === 'remote' && cardLocation.includes('remote')) ||
                    (location === 'hybrid' && cardLocation.includes('hybrid'));

                let matchesSalary = true;
                if (salary) {
                    if (salary === '2.5-5') {
                        matchesSalary = cardSalaryMin >= 2500000 && cardSalaryMax <= 5000000;
                    } else if (salary === '5-10') {
                        matchesSalary = cardSalaryMin >= 5000000 && cardSalaryMax <= 12000000;
                    } else if (salary === '10-20') {
                        matchesSalary = cardSalaryMin >= 10000000 && cardSalaryMax <= 20000000;
                    } else if (salary === '20-plus') {
                        matchesSalary = cardSalaryMax >= 20000000 || cardSalaryMin >= 20000000;
                    }
                }

                if (matchesQuery && matchesType && matchesLocation && matchesSalary) {
                    card.style.display = 'flex';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (visibleCount === 0) {
                emptyState.style.display = 'block';
            } else {
                emptyState.style.display = 'none';
            }
        }

        if (heroSearch) {
            heroSearch.addEventListener('input', (e) => {
                filterSearch.value = e.target.value;
                filterJobs();
            });
        }

        if (heroSearchBtn) {
            heroSearchBtn.addEventListener('click', () => {
                filterSearch.value = heroSearch.value;
                filterJobs();
                const targetElement = document.querySelector('.jo-main-container');
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            });
        }

        if (filterSearch) {
            filterSearch.addEventListener('input', (e) => {
                if (heroSearch) heroSearch.value = e.target.value;
                filterJobs();
            });
        }

        if (filterType) filterType.addEventListener('change', filterJobs);
        if (filterLocation) filterLocation.addEventListener('change', filterJobs);
        if (filterSalary) filterSalary.addEventListener('change', filterJobs);

        window.resetFilters = function() {
            if (heroSearch) heroSearch.value = '';
            if (filterSearch) filterSearch.value = '';
            if (filterType) filterType.value = '';
            if (filterLocation) filterLocation.value = '';
            if (filterSalary) filterSalary.value = '';
            filterJobs();
        };
    });
</script>
@endsection
