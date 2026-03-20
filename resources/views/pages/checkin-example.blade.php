@extends('layouts.app')

@section('title', 'Check In — Example')
@section('meta_description', 'See how checking in to a location works in When and What.')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    <style>
        /* ── Page wrapper ──────────────────────────────────────── */
        .checkin-page {
            display: flex;
            height: calc(100vh - 57px);
            overflow: hidden;
        }

        /* ── Left panel ────────────────────────────────────────── */
        .checkin-panel {
            width: 360px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            border-right: 1px solid var(--ww-border);
            overflow: hidden;
            background: #fff;
        }

        .checkin-panel-header {
            padding: 1.25rem 1.25rem 1rem;
            border-bottom: 1px solid var(--ww-border);
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .checkin-panel-header h5 {
            font-weight: 700;
            font-size: 1rem;
            margin: 0;
            color: var(--ww-dark);
            letter-spacing: -0.02em;
        }

        .checkin-back {
            font-size: 0.78rem;
            color: var(--ww-muted);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .checkin-back:hover {
            color: var(--ww-dark);
        }

        .checkin-form-scroll {
            flex: 1;
            overflow-y: auto;
            padding: 1rem 1.25rem;
            display: flex;
            flex-direction: column;
            gap: 1.1rem;
        }

        /* ── Form fields ───────────────────────────────────────── */
        .checkin-field label {
            display: block;
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--ww-muted);
            margin-bottom: 0.4rem;
        }

        .checkin-field label .optional {
            font-weight: 400;
            text-transform: none;
            letter-spacing: 0;
            font-size: 0.72rem;
            color: #94a3b8;
        }

        .checkin-field input[type="date"],
        .checkin-field input[type="time"],
        .checkin-field textarea {
            width: 100%;
            border: 1px solid var(--ww-border);
            border-radius: 8px;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            font-family: 'Inter', system-ui, sans-serif;
            color: var(--ww-dark);
            background: #fff;
            transition: border-color 0.15s, box-shadow 0.15s;
            outline: none;
        }

        .checkin-field input:focus,
        .checkin-field textarea:focus {
            border-color: var(--ww-accent);
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.12);
        }

        .checkin-field textarea {
            resize: none;
            height: 80px;
            line-height: 1.5;
        }

        .checkin-field textarea::placeholder {
            color: #94a3b8;
        }

        .checkin-datetime-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }

        /* ── Location list ─────────────────────────────────────── */
        .location-list-label {
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--ww-muted);
            margin-bottom: 0.4rem;
        }

        .location-list {
            border: 1px solid var(--ww-border);
            border-radius: 8px;
            overflow: hidden;
        }

        .location-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 0.85rem;
            cursor: pointer;
            transition: background 0.1s;
            border-bottom: 1px solid var(--ww-border);
        }

        .location-item:last-child {
            border-bottom: none;
        }

        .location-item:hover {
            background: var(--ww-light);
        }

        .location-item.selected {
            background: #f0fdfa;
        }

        .location-dot {
            width: 0.6rem;
            height: 0.6rem;
            border-radius: 50%;
            background: var(--ww-border);
            flex-shrink: 0;
            transition: background 0.15s, box-shadow 0.15s;
        }

        .location-item.selected .location-dot {
            background: var(--ww-accent);
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.2);
        }

        .location-item-body {
            flex: 1;
            min-width: 0;
        }

        .location-item-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--ww-dark);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .location-item.selected .location-item-name {
            color: var(--ww-accent-dark);
        }

        .location-item-sub {
            font-size: 0.75rem;
            color: var(--ww-muted);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .location-visits {
            font-size: 0.68rem;
            color: #94a3b8;
            flex-shrink: 0;
            white-space: nowrap;
        }

        /* ── Submit footer ─────────────────────────────────────── */
        .checkin-footer {
            flex-shrink: 0;
            padding: 0.875rem 1.25rem;
            border-top: 1px solid var(--ww-border);
            background: #fff;
        }

        .btn-submit-checkin {
            width: 100%;
            padding: 0.65rem;
            background: var(--ww-accent);
            color: #fff;
            font-weight: 700;
            font-size: 0.9rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.15s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
        }

        .btn-submit-checkin:hover {
            background: var(--ww-accent-dark);
        }

        .btn-submit-checkin:disabled {
            background: var(--ww-border);
            color: var(--ww-muted);
            cursor: default;
        }

        /* ── Map column ────────────────────────────────────────── */
        .checkin-map-col {
            flex: 1;
            position: relative;
            min-width: 0;
        }

        #checkin-map {
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        /* ── Toast ─────────────────────────────────────────────── */
        .demo-toast-wrap {
            position: fixed;
            bottom: 1.5rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
            pointer-events: none;
        }

        .demo-toast {
            background: var(--ww-dark);
            color: #fff;
            font-size: 0.85rem;
            padding: 0.6rem 1.25rem;
            border-radius: 999px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.18);
            opacity: 0;
            transition: opacity 0.2s;
            white-space: nowrap;
        }

        .demo-toast.show {
            opacity: 1;
        }

        /* ── Leaflet tweaks ────────────────────────────────────── */
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

        /* ── Mobile ────────────────────────────────────────────── */
        @media (max-width: 767px) {
            .checkin-page {
                flex-direction: column;
                height: auto;
            }

            .checkin-panel {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid var(--ww-border);
                max-height: none;
            }

            .checkin-map-col {
                height: 60vw;
                min-height: 300px;
            }
        }
    </style>
@endpush

@section('content')

    <div class="checkin-page">

        {{-- Left: form panel --}}
        <div class="checkin-panel">

            <div class="checkin-panel-header">
                <h5><i class="fa-solid fa-location-dot me-1" style="color: var(--ww-accent)"></i> New Check-in</h5>
                <a href="{{ route('example') }}" class="checkin-back">
                    <i class="fa-solid fa-arrow-left"></i> Back to day
                </a>
            </div>

            <div class="checkin-form-scroll">

                {{-- Date & Time --}}
                <div class="checkin-datetime-row">
                    <div class="checkin-field">
                        <label>Date</label>
                        <input type="date" value="2025-04-15">
                    </div>
                    <div class="checkin-field">
                        <label>Time</label>
                        <input type="time" value="11:30">
                    </div>
                </div>

                {{-- Location picker --}}
                <div>
                    <div class="location-list-label">Location</div>
                    <div class="location-list" id="location-list">

                        <div class="location-item" data-key="home" onclick="selectLocation('home')">
                            <div class="location-dot"></div>
                            <div class="location-item-body">
                                <div class="location-item-name">Home</div>
                                <div class="location-item-sub">Noe Valley</div>
                            </div>
                            <div class="location-visits">47 visits</div>
                        </div>

                        <div class="location-item" data-key="coffee" onclick="selectLocation('coffee')">
                            <div class="location-dot"></div>
                            <div class="location-item-body">
                                <div class="location-item-name">Ritual Coffee Roasters</div>
                                <div class="location-item-sub">Valencia St, Mission</div>
                            </div>
                            <div class="location-visits">23 visits</div>
                        </div>

                        <div class="location-item selected" data-key="work" onclick="selectLocation('work')">
                            <div class="location-dot"></div>
                            <div class="location-item-body">
                                <div class="location-item-name">Acme Corp HQ</div>
                                <div class="location-item-sub">Market St, SoMa</div>
                            </div>
                            <div class="location-visits">89 visits</div>
                        </div>

                        <div class="location-item" data-key="tartine" onclick="selectLocation('tartine')">
                            <div class="location-dot"></div>
                            <div class="location-item-body">
                                <div class="location-item-name">Tartine Bakery</div>
                                <div class="location-item-sub">18th St, Mission</div>
                            </div>
                            <div class="location-visits">15 visits</div>
                        </div>

                        <div class="location-item" data-key="park" onclick="selectLocation('park')">
                            <div class="location-dot"></div>
                            <div class="location-item-body">
                                <div class="location-item-name">Dolores Park</div>
                                <div class="location-item-sub">Dolores St, Mission</div>
                            </div>
                            <div class="location-visits">31 visits</div>
                        </div>

                        <div class="location-item" data-key="grocery" onclick="selectLocation('grocery')">
                            <div class="location-dot"></div>
                            <div class="location-item-body">
                                <div class="location-item-name">Whole Foods Market</div>
                                <div class="location-item-sub">Market St, Castro</div>
                            </div>
                            <div class="location-visits">28 visits</div>
                        </div>

                    </div>
                </div>

                {{-- Note --}}
                <div class="checkin-field">
                    <label>Note <span class="optional">— optional</span></label>
                    <textarea placeholder="Add a note about this visit…"></textarea>
                </div>

            </div>{{-- /checkin-form-scroll --}}

            <div class="checkin-footer">
                <button class="btn-submit-checkin" onclick="showDemoToast()">
                    <i class="fa-solid fa-location-dot"></i> Check In
                </button>
            </div>

        </div>{{-- /checkin-panel --}}

        {{-- Right: map --}}
        <div class="checkin-map-col">
            <div id="checkin-map"></div>
        </div>

    </div>{{-- /checkin-page --}}

    {{-- Demo toast --}}
    <div class="demo-toast-wrap">
        <div class="demo-toast" id="demo-toast">
            <i class="fa-solid fa-circle-check me-1" style="color: #5eead4"></i>
            In the real app, this would save your check-in!
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV/XN2GqIo=" crossorigin=""></script>
    <script>
        (function() {

            // ── Location data ──────────────────────────────────────────
            const locations = {
                home: {
                    latlng: [37.7500, -122.4350],
                    name: 'Home',
                    sub: 'Noe Valley'
                },
                coffee: {
                    latlng: [37.7641, -122.4214],
                    name: 'Ritual Coffee Roasters',
                    sub: 'Valencia St · 23 visits'
                },
                work: {
                    latlng: [37.7693, -122.4245],
                    name: 'Acme Corp HQ',
                    sub: 'Market St, SoMa · 89 visits'
                },
                tartine: {
                    latlng: [37.7609, -122.4243],
                    name: 'Tartine Bakery',
                    sub: '18th St, Mission · 15 visits'
                },
                park: {
                    latlng: [37.7596, -122.4269],
                    name: 'Dolores Park',
                    sub: 'Dolores St · 31 visits'
                },
                grocery: {
                    latlng: [37.7671, -122.4322],
                    name: 'Whole Foods Market',
                    sub: 'Market St, Castro · 28 visits'
                },
            };

            let selectedKey = 'work';

            // ── Map init ───────────────────────────────────────────────
            const map = L.map('checkin-map', {
                zoomControl: true
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // ── Marker factory ─────────────────────────────────────────
            function makeMarker(key) {
                const loc = locations[key];
                const isSelected = key === selectedKey;
                return L.circleMarker(loc.latlng, {
                    radius: isSelected ? 11 : 8,
                    color: '#fff',
                    fillColor: isSelected ? '#0d9488' : '#94a3b8',
                    fillOpacity: 1,
                    weight: isSelected ? 3 : 2,
                }).bindPopup(
                    `<div class="popup-title">${loc.name}</div><div class="popup-sub">${loc.sub}</div>`
                ).on('click', () => selectLocation(key));
            }

            // ── Build markers ──────────────────────────────────────────
            const markers = {};
            Object.keys(locations).forEach(key => {
                markers[key] = makeMarker(key).addTo(map);
            });

            // ── Fit bounds ─────────────────────────────────────────────
            const allPoints = Object.values(locations).map(l => l.latlng);
            map.fitBounds(L.latLngBounds(allPoints), {
                padding: [40, 40]
            });

            // ── Select a location ──────────────────────────────────────
            window.selectLocation = function(key) {
                const prev = selectedKey;
                selectedKey = key;

                // Update list items
                document.querySelectorAll('.location-item').forEach(el => {
                    el.classList.toggle('selected', el.dataset.key === key);
                });

                // Redraw markers (prev and new)
                [prev, key].forEach(k => {
                    if (!markers[k]) return;
                    markers[k].remove();
                    markers[k] = makeMarker(k).addTo(map);
                });

                // Pan map
                map.flyTo(locations[key].latlng, 16, {
                    duration: 0.7
                });
                setTimeout(() => markers[key].openPopup(), 750);
            };

            // ── Demo toast ─────────────────────────────────────────────
            window.showDemoToast = function() {
                const toast = document.getElementById('demo-toast');
                toast.classList.add('show');
                setTimeout(() => toast.classList.remove('show'), 2800);
            };

        })();
    </script>
@endpush
