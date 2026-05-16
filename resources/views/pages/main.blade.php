<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EduCore — Student Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --navy: #0f172a;
            --navy-mid: #1e293b;
            --navy-light: #334155;
            --accent: #6ee7b7;
            --accent-dim: #34d399;
            --accent-glow: rgba(110, 231, 183, 0.18);
            --gold: #fbbf24;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            --glass: rgba(255, 255, 255, 0.04);
            --glass-border: rgba(255, 255, 255, 0.09);
            --card-bg: rgba(15, 23, 42, 0.7);
        }

        html, body {
            height: 100%;
            font-family: 'Outfit', sans-serif;
            background-color: var(--navy);
            color: var(--text-primary);
            overflow-x: hidden;
        }

        /* ── Background canvas ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 20% -10%, rgba(110, 231, 183, 0.12) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 90% 110%, rgba(99, 102, 241, 0.10) 0%, transparent 55%),
                radial-gradient(ellipse 40% 40% at 55% 50%, rgba(251, 191, 36, 0.04) 0%, transparent 60%);
            pointer-events: none;
            z-index: 0;
        }

        /* ── Grid dots overlay ── */
        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle, rgba(148, 163, 184, 0.12) 1px, transparent 1px);
            background-size: 32px 32px;
            pointer-events: none;
            z-index: 0;
            mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 40%, transparent 100%);
        }

        /* ── Layout ── */
        .page {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: grid;
            grid-template-rows: auto 1fr auto;
        }

        /* ── Nav ── */
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem 3rem;
            border-bottom: 1px solid var(--glass-border);
            backdrop-filter: blur(12px);
            background: rgba(15, 23, 42, 0.5);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
        }

        .logo-mark {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--accent), #34d399);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-mark svg {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: var(--navy);
            stroke-width: 2.2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .logo-text {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--text-primary);
            letter-spacing: -0.02em;
        }

        .logo-text span {
            color: var(--accent);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            font-family: 'Outfit', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-secondary);
            background: transparent;
            border: 1px solid transparent;
            cursor: pointer;
            text-decoration: none;
            transition: color 0.2s, border-color 0.2s, background 0.2s;
        }

        .btn-ghost:hover {
            color: var(--text-primary);
            border-color: var(--glass-border);
            background: var(--glass);
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.55rem 1.4rem;
            border-radius: 8px;
            font-family: 'Outfit', sans-serif;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--navy);
            background: var(--accent);
            border: none;
            cursor: pointer;
            text-decoration: none;
            letter-spacing: 0.01em;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 0 0 0 rgba(110, 231, 183, 0);
        }

        .btn-primary:hover {
            background: #a7f3d0;
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(110, 231, 183, 0.25);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* ── Hero ── */
        .hero {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 5rem 2rem 4rem;
            gap: 2.5rem;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.35rem 1rem;
            border-radius: 999px;
            background: rgba(110, 231, 183, 0.1);
            border: 1px solid rgba(110, 231, 183, 0.25);
            font-size: 0.78rem;
            font-weight: 500;
            color: var(--accent-dim);
            letter-spacing: 0.04em;
            text-transform: uppercase;
            animation: fadeUp 0.6s ease both;
        }

        .badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--accent);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.8); }
        }

        .hero-heading {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(2.8rem, 6vw, 5rem);
            line-height: 1.08;
            letter-spacing: -0.02em;
            color: var(--text-primary);
            max-width: 720px;
            animation: fadeUp 0.6s 0.1s ease both;
        }

        .hero-heading em {
            font-style: italic;
            color: var(--accent);
        }

        .hero-sub {
            font-size: 1.1rem;
            color: var(--text-secondary);
            max-width: 500px;
            line-height: 1.7;
            font-weight: 400;
            animation: fadeUp 0.6s 0.2s ease both;
        }

        .hero-cta {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
            animation: fadeUp 0.6s 0.3s ease both;
        }

        .btn-large {
            padding: 0.85rem 2.2rem;
            font-size: 1rem;
            border-radius: 10px;
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.85rem 2rem;
            border-radius: 10px;
            font-family: 'Outfit', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            color: var(--text-secondary);
            background: transparent;
            border: 1px solid var(--glass-border);
            cursor: pointer;
            text-decoration: none;
            transition: color 0.2s, border-color 0.2s, background 0.2s;
        }

        .btn-outline:hover {
            color: var(--text-primary);
            border-color: rgba(255,255,255,0.2);
            background: var(--glass);
        }

        /* ── Stats strip ── */
        .stats {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0;
            flex-wrap: wrap;
            animation: fadeUp 0.6s 0.4s ease both;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.2rem;
            padding: 0 2.5rem;
            border-right: 1px solid var(--glass-border);
        }

        .stat-item:last-child { border-right: none; }

        .stat-number {
            font-family: 'DM Serif Display', serif;
            font-size: 1.8rem;
            color: var(--text-primary);
        }

        .stat-label {
            font-size: 0.78rem;
            color: var(--text-muted);
            font-weight: 400;
            letter-spacing: 0.03em;
        }

        /* ── Feature cards ── */
        .features {
            padding: 1rem 2rem 5rem;
            max-width: 1100px;
            margin: 0 auto;
            width: 100%;
            animation: fadeUp 0.6s 0.5s ease both;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
        }

        .card {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 14px;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            transition: border-color 0.2s, background 0.2s, transform 0.2s;
            backdrop-filter: blur(8px);
        }

        .card:hover {
            border-color: rgba(110, 231, 183, 0.2);
            background: rgba(110, 231, 183, 0.04);
            transform: translateY(-2px);
        }

        .card-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--accent-glow);
            border: 1px solid rgba(110, 231, 183, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-icon svg {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: var(--accent);
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .card h3 {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .card p {
            font-size: 0.82rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* ── Footer ── */
        footer {
            border-top: 1px solid var(--glass-border);
            padding: 1.25rem 3rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        footer p {
            font-size: 0.78rem;
            color: var(--text-muted);
        }

        footer a {
            font-size: 0.78rem;
            color: var(--text-muted);
            text-decoration: none;
        }

        footer a:hover { color: var(--accent); }

        /* ── Animation ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Responsive ── */
        @media (max-width: 640px) {
            nav { padding: 1rem 1.25rem; }
            .hero { padding: 3.5rem 1.25rem 3rem; }
            .stat-item { padding: 0 1.25rem; }
            .features { padding: 0.5rem 1.25rem 3rem; }
            footer { padding: 1rem 1.25rem; flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>
<body>
<div class="page">

    <!-- Nav -->
    <nav>
        <a href="/" class="logo">
            <div class="logo-mark">
                <svg viewBox="0 0 24 24"><path d="M12 3L4 7v5c0 5.25 3.5 9.74 8 11 4.5-1.26 8-5.75 8-11V7l-8-4z"/></svg>
            </div>
            <span class="logo-text">Edu<span>Core</span></span>
        </a>
        <div class="nav-actions">
            <a href="{{ route('login') }}" class="btn-ghost">Sign in</a>
            <a href="{{ route('register') }}" class="btn-primary">Get started</a>
        </div>
    </nav>

    <!-- Hero -->
    <main class="hero">
        <div class="badge">
            <span class="badge-dot"></span>
            Student Management Platform
        </div>

        <h1 class="hero-heading">
            Manage your school<br><em>smarter,</em> not harder.
        </h1>

        <p class="hero-sub">
            A unified platform for students, faculty, and administrators. Track attendance, grades, and performance — all in one place.
        </p>

        <div class="hero-cta">
            <a href="{{ route('register') }}" class="btn-primary btn-large">
                Create free account
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('login') }}" class="btn-outline">
                Sign in to dashboard
            </a>
        </div>

        <div class="stats">
            <div class="stat-item">
                <span class="stat-number">12k+</span>
                <span class="stat-label">Students enrolled</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">98%</span>
                <span class="stat-label">Uptime reliability</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">340+</span>
                <span class="stat-label">Institutions trust us</span>
            </div>
        </div>

        <!-- Feature cards -->
        <div class="features">
            <div class="cards-grid">
                <div class="card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                    </div>
                    <h3>Attendance Tracking</h3>
                    <p>Real-time attendance logs with automated alerts for absences and trends.</p>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
                    </div>
                    <h3>Grade Management</h3>
                    <p>Publish results, manage assessments, and generate transcripts instantly.</p>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                    </div>
                    <h3>Role-Based Access</h3>
                    <p>Tailored dashboards for students, teachers, and admins — with fine-grained permissions.</p>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                    </div>
                    <h3>Analytics & Reports</h3>
                    <p>Visual insights into performance, cohort trends, and institution-wide metrics.</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>© {{ date('Y') }} EduCore. All rights reserved.</p>
        <div style="display:flex;gap:1.5rem;">
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
            <a href="#">Support</a>
        </div>
    </footer>

</div>
</body>
</html>
