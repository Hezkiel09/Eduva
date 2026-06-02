@extends('layouts.app')

@section('title', 'Peluang Karir - Eduva')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/job-opportunity.css') }}">
@endpush

<div class="jo-hero">
    <div class="jo-hero-overlay"></div>
    <div class="page-container jo-hero-content">
        <h1>Find Your Next Opportunity</h1>
        <p>Connect with industry leaders and discover career-defining roles tailored to your aspirations.</p>
        <div class="jo-hero-search">
            <input type="text" placeholder="Search jobs, internships, companies...">
            <button>Search</button>
        </div>
    </div>
</div>

<div class="page-container jo-main-container">
    <!-- Filters Bar -->
    <div class="jo-filters-bar">
        <div class="jo-search-wrapper">
            <svg class="jo-search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input type="text" placeholder="Search jobs, internships, companies...">
        </div>
        
        <div class="jo-dropdowns">
            <div class="jo-select-wrapper">
                <select>
                    <option value="" disabled selected>Employment Type</option>
                    <option>Full-time</option>
                    <option>Part-time</option>
                    <option>Internship</option>
                    <option>Contract</option>
                </select>
            </div>
            
            <div class="jo-select-wrapper">
                <select>
                    <option value="" disabled selected>Location</option>
                    <option>Jakarta</option>
                    <option>Remote</option>
                    <option>Hybrid</option>
                    <option>Bandung</option>
                </select>
            </div>

            <div class="jo-select-wrapper">
                <select>
                    <option value="" disabled selected>Salary Range</option>
                    <option>Rp2.5M - Rp5M</option>
                    <option>Rp5M - Rp10M</option>
                    <option>Rp10M - Rp20M</option>
                    <option>> Rp20M</option>
                </select>
            </div>
        </div>

        <button class="jo-filter-btn">
            <span>Job Filters</span>
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Job Cards Grid -->
    <div class="jo-grid">
        <!-- Card 1 -->
        <div class="jo-card">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-tokopedia">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                        <polyline points="2 17 12 22 22 17"></polyline>
                        <polyline points="2 12 12 17 22 12"></polyline>
                    </svg>
                </div>
                <div class="jo-match-badge">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Match Score: 92%</span>
                </div>
            </div>
            <div class="jo-card-body">
                <h3>UI/UX Designer Intern</h3>
                <div class="jo-company-info">Tokopedia • Jakarta (Hybrid)</div>
                <div class="jo-salary">Rp2.5M - Rp4M <span class="jo-period">/ month</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">Figma</span>
                    <span class="jo-tag">Design Thinking</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="#" class="jo-details-btn">Details</a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="jo-card">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-gojek">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    </svg>
                </div>
                <div class="jo-match-badge">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Match Score: 88%</span>
                </div>
            </div>
            <div class="jo-card-body">
                <h3>Product Management Trainee</h3>
                <div class="jo-company-info">Gojek • Remote</div>
                <div class="jo-salary">Rp8M - Rp12M <span class="jo-period">/ month</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">Agile</span>
                    <span class="jo-tag">Data Analysis</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="#" class="jo-details-btn">Details</a>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="jo-card">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-traveloka">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                </div>
                <div class="jo-match-badge">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Match Score: 85%</span>
                </div>
            </div>
            <div class="jo-card-body">
                <h3>Junior Frontend Developer</h3>
                <div class="jo-company-info">Traveloka • Jakarta</div>
                <div class="jo-salary">Rp6.5M - Rp9M <span class="jo-period">/ month</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">React.js</span>
                    <span class="jo-tag">JavaScript</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="#" class="jo-details-btn">Details</a>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="jo-card">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-grab">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                </div>
                <div class="jo-match-badge">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Match Score: 82%</span>
                </div>
            </div>
            <div class="jo-card-body">
                <h3>Mobile App Developer</h3>
                <div class="jo-company-info">Grab • Remote</div>
                <div class="jo-salary">Rp10M - Rp15M <span class="jo-period">/ month</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">Flutter</span>
                    <span class="jo-tag">Dart</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="#" class="jo-details-btn">Details</a>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="jo-card">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-shopee">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="20" x2="18" y2="10"></line>
                        <line x1="12" y1="20" x2="12" y2="4"></line>
                        <line x1="6" y1="20" x2="6" y2="14"></line>
                    </svg>
                </div>
                <div class="jo-match-badge">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Match Score: 78%</span>
                </div>
            </div>
            <div class="jo-card-body">
                <h3>Data Analyst Intern</h3>
                <div class="jo-company-info">Shopee • Jakarta</div>
                <div class="jo-salary">Rp3M - Rp5M <span class="jo-period">/ month</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">Python</span>
                    <span class="jo-tag">SQL</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="#" class="jo-details-btn">Details</a>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="jo-card">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-tiket">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    </svg>
                </div>
                <div class="jo-match-badge">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Match Score: 75%</span>
                </div>
            </div>
            <div class="jo-card-body">
                <h3>Backend Engineer</h3>
                <div class="jo-company-info">Tiket.com • Remote</div>
                <div class="jo-salary">Rp12M - Rp18M <span class="jo-period">/ month</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">Node.js</span>
                    <span class="jo-tag">Go</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="#" class="jo-details-btn">Details</a>
            </div>
        </div>

        <!-- Card 7 -->
        <div class="jo-card">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-aws">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                </div>
                <div class="jo-match-badge">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Match Score: 80%</span>
                </div>
            </div>
            <div class="jo-card-body">
                <h3>Cloud Solutions Architect</h3>
                <div class="jo-company-info">AWS • Jakarta</div>
                <div class="jo-salary">Rp15M - Rp25M <span class="jo-period">/ month</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">AWS</span>
                    <span class="jo-tag">Cloud Architecture</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="#" class="jo-details-btn">Details</a>
            </div>
        </div>

        <!-- Card 8 -->
        <div class="jo-card">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-bca">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="10" rx="2" ry="2"></rect>
                        <path d="M12 2a5 5 0 0 0-5 5v4h10V7a5 5 0 0 0-5-5z"></path>
                    </svg>
                </div>
                <div class="jo-match-badge">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Match Score: 77%</span>
                </div>
            </div>
            <div class="jo-card-body">
                <h3>Cybersecurity Analyst</h3>
                <div class="jo-company-info">BCA • Hybrid</div>
                <div class="jo-salary">Rp10M - Rp18M <span class="jo-period">/ month</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">Network Security</span>
                    <span class="jo-tag">Pen Testing</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="#" class="jo-details-btn">Details</a>
            </div>
        </div>

        <!-- Card 9 -->
        <div class="jo-card">
            <div class="jo-card-header">
                <div class="jo-company-logo logo-bukalapak">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                </div>
                <div class="jo-match-badge">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Match Score: 84%</span>
                </div>
            </div>
            <div class="jo-card-body">
                <h3>Machine Learning Engineer</h3>
                <div class="jo-company-info">Bukalapak • Remote</div>
                <div class="jo-salary">Rp12M - Rp20M <span class="jo-period">/ month</span></div>
                <div class="jo-tags">
                    <span class="jo-tag">Python</span>
                    <span class="jo-tag">TensorFlow</span>
                </div>
            </div>
            <div class="jo-card-footer">
                <a href="#" class="jo-details-btn">Details</a>
            </div>
        </div>
    </div>

    <!-- Load More -->
    <div class="jo-load-more">
        <button class="jo-load-btn">Load More Opportunities</button>
    </div>
</div>
@endsection
