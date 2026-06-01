@extends('layouts.app')

@section('title', 'Learning Path - Eduva')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/learning-path.css') }}">
@endpush

<div class="page-container">
    <div class="lp-hero">
        <div class="lp-hero-content">
            <h1>Choose Your <span>Learning</span><br>Path!</h1>
            <p>Select a specialized career track to begin your personalized vocational journey. Our curriculum is built in partnership with top tech leaders.</p>
        </div>
        <!-- Placeholder for the right side graphic -->
        <div style="flex: 1; min-height: 200px; display: flex; align-items: center; justify-content: center;">
            <img src="{{ asset('img/landingpage/Mask Group.png') }}" style="max-height: 250px; opacity: 0.8; object-fit: contain;" alt="Hero Image">
        </div>
    </div>

    <div class="lp-grid">
        <!-- Frontend -->
        <div class="lp-card">
            <div class="lp-card-img">
                <img src="{{ asset('img/learningpath/fe.png') }}" alt="Frontend Developer">
                <span class="lp-badge">Popular</span>
            </div>
            <div class="lp-card-body">
                <div class="lp-card-title">Frontend Developer</div>
                <div class="lp-card-desc">Master the art of building responsive, high-performance user interfaces...</div>
                <div class="lp-card-footer">
                    <div class="lp-duration">⏱ 6-8 Months</div>
                    <a href="https://roadmap.sh/frontend" class="lp-btn">Select Track</a>
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
                <div class="lp-card-desc">Build robust systems, scalable APIs, and secure database architectures...</div>
                <div class="lp-card-footer">
                    <div class="lp-duration">⏱ 6-8 Months</div>
                    <a href="https://roadmap.sh/backend" class="lp-btn">Select Track</a>
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
                <div class="lp-card-desc">Design and manage scalable cloud infrastructure on AWS and Azure for...</div>
                <div class="lp-card-footer">
                    <div class="lp-duration">⏱ 8-10 Months</div>
                    <a href="https://roadmap.sh/cloudflare" class="lp-btn">Select Track</a>
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
                <div class="lp-card-desc">Unlock insights from big data using Python, Machine Learning models,...</div>
                <div class="lp-card-footer">
                    <div class="lp-duration">⏱ 10-12 Months</div>
                    <a href="https://roadmap.sh/ai-data-scientist" class="lp-btn">Select Track</a>
                </div>
            </div>
        </div>
        <!-- UI/UX -->
        <div class="lp-card">
            <div class="lp-card-img">
                <img src="{{ asset('img/learningpath/uiux.png') }}" alt="UI/UX Designer">
            </div>
            <div class="lp-card-body">
                <div class="lp-card-title">UI/UX Designer</div>
                <div class="lp-card-desc">Create empathetic, user-centric designs and interactive prototypes...</div>
                <div class="lp-card-footer">
                    <div class="lp-duration">⏱ 5-7 Months</div>
                    <a href="https://roadmap.sh/ux-design" class="lp-btn">Select Track</a>
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
                <div class="lp-card-desc">Protect organizational assets by mastering ethical hacking, network...</div>
                <div class="lp-card-footer">
                    <div class="lp-duration">⏱ 7-9 Months</div>
                    <a href="https://roadmap.sh/cyber-security" class="lp-btn">Select Track</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose -->
    <div class="why-section">
        <h2>Why Choose a Specialized Path?</h2>
        <div class="why-grid">
            <div class="why-item">
                <div class="why-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3>Industry Alignment</h3>
                <p>Curriculum designed with Fortune 500 tech partners to ensure job-readiness from day one.</p>
            </div>
            <div class="why-item">
                <div class="why-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2"></path></svg>
                </div>
                <h3>Professional Certification</h3>
                <p>Earn industry-recognized credentials that open doors to premium employment opportunities.</p>
            </div>
            <div class="why-item">
                <div class="why-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3>Expert Mentorship</h3>
                <p>1-on-1 guidance from professionals who have built careers at Google, Amazon, and Meta.</p>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="testi-section">
        <h2>Student Success Stories</h2>
        <div class="testi-grid">
            <div class="testi-card">
                <div class="testi-author">
                    <div class="testi-avatar"></div>
                    <div class="testi-info">
                        <h4>Elena Rodriguez</h4>
                        <span>Cloud Architect at AWS</span>
                    </div>
                </div>
                <div class="testi-quote">"The hands-on projects and mentorship at EDUVA gave me the practical confidence I needed to transition into high-level cloud architecture."</div>
            </div>
            <div class="testi-card">
                <div class="testi-author">
                    <div class="testi-avatar"></div>
                    <div class="testi-info">
                        <h4>Marcus Chen</h4>
                        <span>Senior Dev at Microsoft</span>
                    </div>
                </div>
                <div class="testi-quote">"The curriculum is exceptionally modern. I found myself using tools in the classroom that I now use every single day at Microsoft."</div>
            </div>
            <div class="testi-card">
                <div class="testi-author">
                    <div class="testi-avatar"></div>
                    <div class="testi-info">
                        <h4>Sarah Jenkins</h4>
                        <span>UX Lead at Google</span>
                    </div>
                </div>
                <div class="testi-quote">"EDUVA doesn't just teach you skills; they teach you how to think like a professional. The career support was the bridge to my dream job."</div>
            </div>
        </div>
    </div>
</div>
@endsection
