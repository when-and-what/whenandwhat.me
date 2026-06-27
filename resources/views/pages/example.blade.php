@extends('layouts.app')

@section('title', 'Example Day')
@section('meta_description',
    'See what a day looks like in When and What — activities, check-ins, and a map of
    everywhere you went.')

    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
            integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
            crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
            integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
            crossorigin=""></script>
        <style>
            /* ── Example page wrapper ──────────────────────────────── */
            .example-page {
                display: flex;
                flex-direction: column;
                height: calc(100vh - 57px);
                /* viewport minus navbar */
            }

            /* ── Day stats bar ─────────────────────────────────────── */
            .day-stats-bar {
                flex-shrink: 0;
                background: var(--ww-light);
                border-bottom: 1px solid var(--ww-border);
                padding: 0 1.25rem;
                display: flex;
                align-items: center;
                gap: 0;
                overflow-x: auto;
                scrollbar-width: none;
            }

            .day-stats-bar::-webkit-scrollbar {
                display: none;
            }

            .day-stat {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.6rem 1.1rem;
                flex-shrink: 0;
                border-right: 1px solid var(--ww-border);
            }

            .day-stat:first-child {
                padding-left: 0;
            }

            .day-stat-icon {
                font-size: 1rem;
                line-height: 1;
                flex-shrink: 0;
            }

            .day-stat-text {
                line-height: 1.2;
            }

            .day-stat-value {
                display: block;
                font-size: 0.875rem;
                font-weight: 700;
                color: var(--ww-dark);
            }

            .day-stat-label {
                display: block;
                font-size: 0.68rem;
                color: var(--ww-muted);
                text-transform: uppercase;
                letter-spacing: 0.04em;
                font-weight: 500;
            }

            /* ── Day navigation header ─────────────────────────────── */
            .day-feed-header {
                padding: 0.75rem 0.75rem 0.75rem 1.25rem;
                border-bottom: 1px solid var(--ww-border);
                flex-shrink: 0;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .day-feed-header-text {
                flex: 1;
                min-width: 0;
            }

            .day-feed-header-text h5 {
                font-weight: 700;
                font-size: 1rem;
                margin-bottom: 0.1rem;
                color: var(--ww-dark);
                letter-spacing: -0.02em;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .day-feed-header-text p {
                font-size: 0.78rem;
                color: var(--ww-muted);
                margin: 0;
            }

            .day-nav-btn {
                width: 1.75rem;
                height: 1.75rem;
                border: 1px solid var(--ww-border);
                border-radius: 6px;
                background: #fff;
                color: var(--ww-muted);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.75rem;
                cursor: pointer;
                flex-shrink: 0;
                transition: border-color 0.15s, color 0.15s, background 0.15s;
            }

            .day-nav-btn:hover {
                border-color: var(--ww-accent);
                color: var(--ww-accent);
                background: #f0fdfa;
            }

            /* ── Empty state (other days) ──────────────────────────── */
            .day-empty-state {
                flex: 1;
                display: none;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 0.75rem;
                color: var(--ww-muted);
                font-size: 0.875rem;
                text-align: center;
                padding: 2rem;
            }

            .day-empty-state i {
                font-size: 2.5rem;
                color: var(--ww-border);
            }

            .day-empty-state p {
                margin: 0;
                line-height: 1.6;
            }

            /* ── Two-column layout ─────────────────────────────────── */
            .day-layout {
                display: flex;
                flex: 1;
                overflow: hidden;
            }

            /* ── Left: activity feed ───────────────────────────────── */
            .day-feed {
                width: 360px;
                flex-shrink: 0;
                display: flex;
                flex-direction: column;
                border-right: 1px solid var(--ww-border);
                overflow: hidden;
            }

            .day-feed-scroll {
                flex: 1;
                overflow-y: auto;
                padding: 0.5rem 0;
            }

            /* ── Activity items ────────────────────────────────────── */
            .activity-item {
                display: flex;
                align-items: flex-start;
                gap: 0.75rem;
                padding: 0.75rem 1.25rem;
                cursor: pointer;
                transition: background 0.1s;
                border-left: 3px solid transparent;
            }

            .activity-item:hover {
                background: var(--ww-light);
            }

            .activity-item.active-item {
                background: #f0fdfa;
                border-left-color: var(--ww-accent);
            }

            .activity-dot {
                width: 2rem;
                height: 2rem;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.9rem;
                flex-shrink: 0;
                margin-top: 0.1rem;
            }

            .dot-checkin {
                background: #ccfbf1;
                color: #0f766e;
            }

            .dot-strava {
                background: #ffedd5;
                color: #c2410c;
            }

            .dot-trakt {
                background: #fee2e2;
                color: #b91c1c;
            }

            .dot-listenbrainz {
                background: #ede9fe;
                color: #6d28d9;
            }

            .activity-body {
                flex: 1;
                min-width: 0;
            }

            .activity-title {
                font-size: 0.875rem;
                font-weight: 600;
                color: var(--ww-dark);
                margin-bottom: 0.1rem;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .activity-sub {
                font-size: 0.775rem;
                color: var(--ww-muted);
                margin-bottom: 0;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .activity-time {
                font-size: 0.72rem;
                color: var(--ww-muted);
                white-space: nowrap;
                flex-shrink: 0;
                padding-top: 0.2rem;
            }

            .activity-divider {
                font-size: 0.7rem;
                font-weight: 600;
                letter-spacing: 0.07em;
                text-transform: uppercase;
                color: var(--ww-muted);
                padding: 0.9rem 1.25rem 0.3rem;
            }

            /* ── Right: map ────────────────────────────────────────── */
            .day-map-col {
                flex: 1;
                position: relative;
                min-width: 0;
            }

            #day-map {
                position: absolute;
                inset: 0;
                z-index: 1;
            }

            /* ── Mobile stacked layout ─────────────────────────────── */
            @media (max-width: 767px) {
                .example-page {
                    height: auto;
                }

                .day-layout {
                    flex-direction: column;
                    height: auto;
                }

                .day-feed {
                    width: 100%;
                    border-right: none;
                    border-bottom: 1px solid var(--ww-border);
                    max-height: 50vh;
                }

                .day-map-col {
                    height: 55vw;
                    min-height: 280px;
                    position: relative;
                }

                #day-map {
                    position: absolute;
                    inset: 0;
                }
            }

            /* ── Check-in action bar ───────────────────────────────── */
            .checkin-bar {
                flex-shrink: 0;
                border-top: 1px solid var(--ww-border);
                padding: 0.75rem 1rem;
                display: flex;
                gap: 0.5rem;
                background: #fff;
            }

            .btn-checkin {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.4rem;
                font-size: 0.8rem;
                font-weight: 600;
                padding: 0.5rem 0.6rem;
                border-radius: 8px;
                border: none;
                cursor: default;
                white-space: nowrap;
            }

            .btn-checkin-primary {
                background: var(--ww-accent);
                color: #fff;
            }

            .btn-checkin-secondary {
                background: var(--ww-light);
                color: var(--ww-dark);
                border: 1px solid var(--ww-border);
            }

            /* ── Expandable track list ─────────────────────────────── */
            .activity-chevron {
                display: block;
                font-size: 0.65rem;
                margin-top: 0.35rem;
                color: var(--ww-muted);
                transition: transform 0.2s ease;
                text-align: right;
            }

            .activity-item-expandable.expanded .activity-chevron {
                transform: rotate(180deg);
            }

            .track-list {
                background: #faf5ff;
                border-top: 1px solid #ede9fe;
                border-bottom: 1px solid #ede9fe;
                overflow: hidden;
                max-height: 0;
                transition: max-height 0.25s ease;
            }

            .track-list.open {
                max-height: 600px;
            }

            .track-item {
                display: flex;
                align-items: center;
                gap: 0.6rem;
                padding: 0.4rem 1.25rem 0.4rem 3.85rem;
                font-size: 0.775rem;
                border-bottom: 1px solid #ede9fe;
            }

            .track-item:last-child {
                border-bottom: none;
            }

            .track-num {
                font-size: 0.68rem;
                color: #a78bfa;
                width: 1rem;
                flex-shrink: 0;
                text-align: right;
            }

            .track-name {
                flex: 1;
                color: var(--ww-dark);
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .track-time {
                font-size: 0.68rem;
                color: var(--ww-muted);
                flex-shrink: 0;
            }

            /* ── Leaflet popup tweaks ──────────────────────────────── */
            .leaflet-popup-content-wrapper {
                border-radius: 10px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
                font-family: 'Inter', system-ui, sans-serif;
            }

            .leaflet-popup-content {
                font-size: 0.82rem;
                margin: 0.6rem 0.85rem;
            }

            .popup-title {
                font-weight: 700;
                color: #0f172a;
                margin-bottom: 0.15rem;
            }

            .popup-sub {
                color: #64748b;
            }
        </style>
    @endpush

@section('content')

    <div class="example-page">

        {{-- Day totals bar --}}
        <div class="day-stats-bar">

            <div class="day-stat">
                <span class="day-stat-icon text-warning"><i class="fa-solid fa-sun"></i></span>
                <div class="day-stat-text">
                    <span class="day-stat-value" id="stats-bar-date">Tue, Apr 15</span>
                    <span class="day-stat-label">San Francisco</span>
                </div>
            </div>

            <div class="day-stat">
                <span class="day-stat-icon" style="color:#ea580c"><i class="fa-solid fa-wave-pulse"></i></span>
                <div class="day-stat-text">
                    <span class="day-stat-value">5.2 mi</span>
                    <span class="day-stat-label">Run</span>
                </div>
            </div>

            <div class="day-stat">
                <span class="day-stat-icon" style="color:#ea580c"><i class="fa-solid fa-clock"></i></span>
                <div class="day-stat-text">
                    <span class="day-stat-value">47 min</span>
                    <span class="day-stat-label">Active</span>
                </div>
            </div>

            <div class="day-stat">
                <span class="day-stat-icon" style="color:#0d9488"><i class="fa-solid fa-location-dot"></i></span>
                <div class="day-stat-text">
                    <span class="day-stat-value">5</span>
                    <span class="day-stat-label">Check-ins</span>
                </div>
            </div>

            <div class="day-stat">
                <span class="day-stat-icon" style="color:#6d28d9"><i class="fa-solid fa-music"></i></span>
                <div class="day-stat-text">
                    <span class="day-stat-value">14</span>
                    <span class="day-stat-label">Songs</span>
                </div>
            </div>

            <div class="day-stat">
                <span class="day-stat-icon" style="color:#b91c1c"><i class="fa-solid fa-film"></i></span>
                <div class="day-stat-text">
                    <span class="day-stat-value">1</span>
                    <span class="day-stat-label">Movie</span>
                </div>
            </div>

        </div>{{-- /day-stats-bar --}}

        {{-- Two-column layout --}}
        <div class="day-layout">

            {{-- Left: activity feed --}}
            <div class="day-feed">
                <div class="day-feed-header">
                    <button class="day-nav-btn" onclick="navigateDay(-1)" title="Previous day">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <div class="day-feed-header-text">
                        <h5 id="feed-header-date">Tuesday, April 15, 2025</h5>
                        <p id="feed-header-sub">7 activities &nbsp;·&nbsp; San Francisco, CA</p>
                    </div>
                    <button class="day-nav-btn" id="btn-next-day" onclick="navigateDay(1)" title="Next day">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>

                <div class="day-empty-state" id="day-empty-state">
                    <i class="fa-solid fa-calendar"></i>
                    <p>No activities recorded<br>for this day.</p>
                </div>

                <div class="day-feed-scroll" id="day-feed-scroll">

                    <div class="activity-divider">Morning</div>

                    {{-- Strava run --}}
                    <div class="activity-item" data-marker="strava" onclick="focusActivity('strava')">
                        <div class="activity-dot dot-strava"><i class="fa-solid fa-wave-pulse"></i></div>
                        <div class="activity-body">
                            <div class="activity-title">Morning Run</div>
                            <div class="activity-sub">5.2 mi &nbsp;·&nbsp; 47:23 &nbsp;·&nbsp; 9:07/mi</div>
                        </div>
                        <div class="activity-time">6:47 AM</div>
                    </div>

                    {{-- Check-in: coffee --}}
                    <div class="activity-item" data-marker="coffee" onclick="focusActivity('coffee')">
                        <div class="activity-dot dot-checkin"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="activity-body">
                            <div class="activity-title">Ritual Coffee Roasters</div>
                            <div class="activity-sub">Valencia St, Mission District</div>
                        </div>
                        <div class="activity-time">8:32 AM</div>
                    </div>

                    {{-- Check-in: work --}}
                    <div class="activity-item" data-marker="work" onclick="focusActivity('work')">
                        <div class="activity-dot dot-checkin"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="activity-body">
                            <div class="activity-title">Acme Corp HQ</div>
                            <div class="activity-sub">Market St, SoMa</div>
                        </div>
                        <div class="activity-time">9:18 AM</div>
                    </div>

                    <div class="activity-divider">Afternoon</div>

                    {{-- ListenBrainz (expandable) --}}
                    <div class="activity-expandable">
                        <div class="activity-item activity-item-expandable" onclick="toggleTracks(this, 'tracks-lb')">
                            <div class="activity-dot dot-listenbrainz"><i class="fa-solid fa-music"></i></div>
                            <div class="activity-body">
                                <div class="activity-title">Currents — Tame Impala</div>
                                <div class="activity-sub">14 tracks · ListenBrainz</div>
                            </div>
                            <div class="activity-time">
                                11:00 AM
                                <i class="fa-solid fa-chevron-down activity-chevron"></i>
                            </div>
                        </div>
                        <div class="track-list" id="tracks-lb">
                            <div class="track-item"><span class="track-num">1</span><span class="track-name">Let's
                                    Not</span><span class="track-time">11:00 AM</span></div>
                            <div class="track-item"><span class="track-num">2</span><span class="track-name">Yes I'm
                                    Changing</span><span class="track-time">11:04 AM</span></div>
                            <div class="track-item"><span class="track-num">3</span><span
                                    class="track-name">Eventually</span><span class="track-time">11:08 AM</span></div>
                            <div class="track-item"><span class="track-num">4</span><span
                                    class="track-name">Gossip</span><span class="track-time">11:12 AM</span></div>
                            <div class="track-item"><span class="track-num">5</span><span class="track-name">The Less I
                                    Know the Better</span><span class="track-time">11:16 AM</span></div>
                            <div class="track-item"><span class="track-num">6</span><span class="track-name">Past
                                    Life</span><span class="track-time">11:20 AM</span></div>
                            <div class="track-item"><span class="track-num">7</span><span
                                    class="track-name">Disciples</span><span class="track-time">11:24 AM</span></div>
                            <div class="track-item"><span class="track-num">8</span><span class="track-name">'Cause I'm a
                                    Man</span><span class="track-time">11:27 AM</span></div>
                            <div class="track-item"><span class="track-num">9</span><span class="track-name">Reality in
                                    Motion</span><span class="track-time">11:30 AM</span></div>
                            <div class="track-item"><span class="track-num">10</span><span
                                    class="track-name">Love/Paranoia</span><span class="track-time">11:34 AM</span></div>
                            <div class="track-item"><span class="track-num">11</span><span class="track-name">New Person,
                                    Same Old Mistakes</span><span class="track-time">11:37 AM</span></div>
                            <div class="track-item"><span class="track-num">12</span><span
                                    class="track-name">Borderline</span><span class="track-time">11:43 AM</span></div>
                            <div class="track-item"><span class="track-num">13</span><span class="track-name">It Might Be
                                    Time</span><span class="track-time">11:47 AM</span></div>
                            <div class="track-item"><span class="track-num">14</span><span class="track-name">Breathe
                                    Deeper</span><span class="track-time">11:51 AM</span></div>
                        </div>
                    </div>

                    {{-- Check-in: lunch --}}
                    <div class="activity-item" data-marker="lunch" onclick="focusActivity('lunch')">
                        <div class="activity-dot dot-checkin"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="activity-body">
                            <div class="activity-title">Tartine Bakery</div>
                            <div class="activity-sub">18th St, Mission District</div>
                        </div>
                        <div class="activity-time">12:15 PM</div>
                    </div>

                    <div class="activity-divider">Evening</div>

                    {{-- Check-in: home --}}
                    <div class="activity-item" data-marker="home" onclick="focusActivity('home')">
                        <div class="activity-dot dot-checkin"><i class="fa-solid fa-house"></i></div>
                        <div class="activity-body">
                            <div class="activity-title">Home</div>
                            <div class="activity-sub">Noe Valley</div>
                        </div>
                        <div class="activity-time">6:22 PM</div>
                    </div>

                    {{-- Trakt: movie --}}
                    <div class="activity-item">
                        <div class="activity-dot dot-trakt"><i class="fa-solid fa-film"></i></div>
                        <div class="activity-body">
                            <div class="activity-title">Oppenheimer (2023)</div>
                            <div class="activity-sub">Movie · Trakt · ★★★★½</div>
                        </div>
                        <div class="activity-time">7:30 PM</div>
                    </div>

                </div>{{-- /day-feed-scroll --}}

                {{-- Check-in actions --}}
                <div class="checkin-bar">
                    <a href="{{ route('checkin-example') }}" class="btn-checkin btn-checkin-primary"
                        title="Check in to a saved or nearby location">
                        <i class="fa-solid fa-location-dot"></i> Check In
                    </a>
                    <button class="btn-checkin btn-checkin-secondary"
                        title="Save your current GPS coordinates now — name it later">
                        <i class="fa-solid fa-crosshairs"></i> Drop a Pin
                    </button>
                </div>

            </div>{{-- /day-feed --}}

            {{-- Right: map --}}
            <div class="day-map-col">
                <div id="day-map"></div>
            </div>

        </div>{{-- /day-layout --}}

    </div>{{-- /example-page --}}

@endsection

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV/XN2GqIo=" crossorigin=""></script>
    <script>
        (function() {

            // ── Map init ───────────────────────────────────────────────
            const map = L.map('day-map', {
                zoomControl: true
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // ── Strava GPS route (Dolores Park loop) ───────────────────
            const stravaRoute = [
                [37.7596, -122.4283],
                [37.7606, -122.4265],
                [37.7619, -122.4248],
                [37.7633, -122.4232],
                [37.7646, -122.4219],
                [37.7652, -122.4237],
                [37.7647, -122.4255],
                [37.7635, -122.4269],
                [37.7621, -122.4281],
                [37.7608, -122.4291],
                [37.7596, -122.4283],
            ];

            const routeLine = L.polyline(stravaRoute, {
                color: '#ea580c',
                weight: 4,
                opacity: 0.85,
                lineJoin: 'round',
            }).addTo(map);

            // Start/end dot for run
            L.circleMarker(stravaRoute[0], {
                    radius: 7,
                    color: '#ea580c',
                    fillColor: '#ea580c',
                    fillOpacity: 1,
                    weight: 2
                })
                .bindPopup(
                    '<div class="popup-title">Morning Run</div><div class="popup-sub">5.2 mi · 47:23 · 6:47 AM</div>')
                .addTo(map);

            // ── Check-in marker factory ────────────────────────────────
            function checkinMarker(latlng, title, sub) {
                return L.circleMarker(latlng, {
                    radius: 9,
                    color: '#fff',
                    fillColor: '#0d9488',
                    fillOpacity: 1,
                    weight: 2.5,
                }).bindPopup(`<div class="popup-title">${title}</div><div class="popup-sub">${sub}</div>`);
            }

            // ── Check-in markers ───────────────────────────────────────
            const markers = {
                strava: L.circleMarker([37.7596, -122.4283], {
                    radius: 9,
                    color: '#fff',
                    fillColor: '#ea580c',
                    fillOpacity: 1,
                    weight: 2.5
                }).bindPopup(
                    '<div class="popup-title">Morning Run</div><div class="popup-sub">5.2 mi · 47:23 · 6:47 AM</div>'
                ),

                coffee: checkinMarker([37.7641, -122.4214], 'Ritual Coffee Roasters', 'Valencia St · 8:32 AM'),
                work: checkinMarker([37.7693, -122.4245], 'Acme Corp HQ', 'Market St · 9:18 AM'),
                lunch: checkinMarker([37.7609, -122.4243], 'Tartine Bakery', '18th St · 12:15 PM'),
                home: checkinMarker([37.7500, -122.4350], 'Home', 'Noe Valley · 6:22 PM'),
            };

            Object.values(markers).forEach(m => m.addTo(map));

            // ── Fit map to all features ────────────────────────────────
            const allPoints = [
                ...stravaRoute,
                [37.7641, -122.4214],
                [37.7693, -122.4245],
                [37.7609, -122.4243],
                [37.7500, -122.4350],
            ];
            map.fitBounds(L.latLngBounds(allPoints), {
                padding: [32, 32]
            });

            // ── Day navigation ─────────────────────────────────────────
            const BASE_DATE = new Date(2025, 3, 15); // April 15, 2025
            const DAY_NAMES = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const MON_SHORT = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const MON_LONG = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ];
            const MAX_OFFSET = 3; // how many days forward/back to allow in demo
            let dayOffset = 0;

            window.navigateDay = function(delta) {
                const next = dayOffset + delta;
                if (next < -MAX_OFFSET || next > MAX_OFFSET) return;
                dayOffset = next;

                const d = new Date(BASE_DATE);
                d.setDate(d.getDate() + dayOffset);

                const dayName = DAY_NAMES[d.getDay()];
                const monShort = MON_SHORT[d.getMonth()];
                const monLong = MON_LONG[d.getMonth()];
                const dateNum = d.getDate();
                const year = d.getFullYear();

                // Update header & stats bar
                document.getElementById('feed-header-date').textContent =
                    `${dayName}, ${monLong} ${dateNum}, ${year}`;
                document.getElementById('stats-bar-date').textContent =
                    `${dayName.slice(0,3)}, ${monShort} ${dateNum}`;

                // Show data only for the example day (offset 0)
                const hasData = dayOffset === 0;
                document.getElementById('day-feed-scroll').style.display = hasData ? '' : 'none';
                document.getElementById('day-empty-state').style.display = hasData ? 'none' : 'flex';
                document.getElementById('feed-header-sub').textContent = hasData ?
                    '7 activities\u00a0·\u00a0San Francisco, CA' : 'No activities';

                // Dim the non-date stats when no data
                document.querySelectorAll('.day-stats-bar .day-stat:not(:first-child)').forEach(el => {
                    el.style.opacity = hasData ? '1' : '0.3';
                });

                // Disable prev/next at limits
                document.querySelector('[onclick="navigateDay(-1)"]').style.opacity = dayOffset <= -MAX_OFFSET ?
                    '0.35' : '1';
                document.getElementById('btn-next-day').style.opacity = dayOffset >= MAX_OFFSET ? '0.35' : '1';
            };

            // ── Toggle expandable track list ──────────────────────────
            window.toggleTracks = function(itemEl, trackListId) {
                const list = document.getElementById(trackListId);
                const isOpen = list.classList.contains('open');

                list.classList.toggle('open', !isOpen);
                itemEl.classList.toggle('expanded', !isOpen);
            };

            // ── Click activity item → pan to marker ───────────────────
            window.focusActivity = function(key) {
                const m = markers[key];
                if (!m) return;

                // Remove active class from all items
                document.querySelectorAll('.activity-item').forEach(el => el.classList.remove('active-item'));
                // Add to clicked item
                const clicked = document.querySelector(`[data-marker="${key}"]`);
                if (clicked) clicked.classList.add('active-item');

                map.flyTo(m.getLatLng(), 16, {
                    duration: 0.8
                });
                setTimeout(() => m.openPopup(), 850);
            };

        })();
    </script>
@endpush
