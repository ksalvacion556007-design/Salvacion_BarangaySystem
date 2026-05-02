<!DOCTYPE html>
<html>
<head>
    <title>Staff Dashboard — Barangay Kingking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --blue-deep:   #1a3a6b;
            --blue-mid:    #2255a4;
            --blue-light:  #4a80d4;
            --blue-pale:   #e8f0fb;
            --blue-frost:  #f3f7ff;
            --blue-line:   #d0dff5;
            --text:        #111827;
            --muted:       #6b7a99;
            --white:       #ffffff;
            --sw:          220px;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'DM Sans', sans-serif; background: var(--blue-frost); color: var(--text); display: flex; font-size: 14px; }

        .sidebar {
            width: var(--sw);
            min-height: 100vh;
            background: var(--blue-deep);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            position: fixed;
            top: 0; left: 0;
        }

        .sidebar-brand {
            padding: 28px 24px 22px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .brand-name {
            font-size: 16px;
            font-weight: 600;
            color: var(--white);
            line-height: 1.3;
        }

        .brand-sub {
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.3);
            margin-top: 3px;
        }

        .sidebar-nav {
            flex: 1;
            padding: 20px 0;
            overflow-y: auto;
        }

        .nav-label {
            font-size: 9px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.22);
            padding: 0 24px;
            margin-bottom: 4px;
        }

        .nav-item {
            display: block;
            padding: 10px 24px;
            font-size: 13px;
            font-weight: 400;
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            border: none;
            background: transparent;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: color 0.12s, background 0.12s;
        }

        .nav-item:hover { color: rgba(255,255,255,0.85); background: rgba(255,255,255,0.04); }

        .nav-item.active {
            color: var(--white);
            background: rgba(255,255,255,0.07);
            font-weight: 500;
            border-left: 2px solid var(--blue-light);
        }

        .sidebar-foot {
            padding: 16px 24px;
            border-top: 1px solid rgba(255,255,255,0.06);
        }

        .nav-logout {
            display: block;
            padding: 8px 0;
            font-size: 12.5px;
            color: rgba(255,255,255,0.28);
            background: transparent;
            border: none;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            text-align: left;
            width: 100%;
            transition: color 0.12s;
        }
        .nav-logout:hover { color: rgba(255,120,120,0.75); }

        .main-wrap {
            margin-left: var(--sw);
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--blue-line);
            padding: 0 40px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .breadcrumb { font-size: 12px; color: var(--muted); }
        .breadcrumb b { color: var(--blue-deep); font-weight: 500; }
        .topbar-date { font-size: 11.5px; color: var(--muted); }

        .content { padding: 40px; flex: 1; }

        .page-title {
            font-size: 22px;
            font-weight: 600;
            color: var(--blue-deep);
            margin-bottom: 32px;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--white);
            border: 1px solid var(--blue-line);
            border-radius: 8px;
            padding: 28px 28px 24px;
            border-top: 3px solid var(--blue-line);
            cursor: pointer;
            transition: box-shadow 0.15s, transform 0.15s;
        }

        .stat-card:hover {
            box-shadow: 0 4px 16px rgba(34,85,164,0.10);
            transform: translateY(-2px);
        }

        .stat-card.s-residents    { border-top-color: var(--blue-mid); }
        .stat-card.s-certificates { border-top-color: #2ea86b; }

        .stat-num {
            font-size: 48px;
            font-weight: 600;
            line-height: 1;
            color: var(--blue-deep);
            margin-bottom: 8px;
            letter-spacing: -1px;
        }

        .s-certificates .stat-num { color: #186940; }

        .stat-label {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: var(--muted);
        }

        .stat-hint {
            font-size: 11px;
            color: var(--blue-light);
            margin-top: 8px;
        }

        .chart-card {
            background: var(--white);
            border: 1px solid var(--blue-line);
            border-radius: 8px;
            padding: 28px;
            text-align: center;
        }

        .chart-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--blue-deep);
            margin-bottom: 4px;
        }

        .chart-sub {
            font-size: 12px;
            color: var(--muted);
            margin-bottom: 24px;
        }

        .staff-list-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid var(--blue-line);
            font-size: 13.5px;
        }

        .staff-list-item:last-child { border-bottom: none; }
        .staff-list-name { font-weight: 500; color: var(--blue-deep); }

        .badge-gender {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 20px;
            background: var(--blue-pale);
            color: var(--blue-mid);
        }

        .modal-empty {
            text-align: center;
            color: var(--muted);
            font-style: italic;
            padding: 20px 0;
            font-size: 13px;
        }

        .modal-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .modal-table thead {
            background: var(--blue-pale);
        }

        .modal-table thead th {
            padding: 10px 14px;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--blue-mid);
            text-align: left;
            border-bottom: 1px solid var(--blue-line);
        }

        .modal-table tbody tr {
            border-bottom: 1px solid var(--blue-line);
        }

        .modal-table tbody tr:last-child { border-bottom: none; }

        .modal-table tbody td {
            padding: 10px 14px;
            color: var(--text);
            vertical-align: middle;
        }

        .td-muted { color: var(--muted); font-size: 12px; }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-name">Barangay Kingking</div>
            <div class="brand-sub">Management System</div>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-label">Navigation</div>
            <a href="/staff/dashboard"class="nav-item active">Dashboard</a>
            <a href="/staff/residents"class="nav-item">Residents</a>
            <a href="/staff/certificates"class="nav-item">Certificates</a>
            <a href="/staff/reports"class="nav-item">Reports</a>
            <a href="/staff/archive" class="nav-item">Archive</a>
        </nav>
        <div class="sidebar-foot">
            <button class="nav-logout" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
        </div>
    </div>

    <div class="main-wrap">

        <div class="topbar">
            <div class="breadcrumb">Barangay System &nbsp;/&nbsp; <b>Dashboard</b></div>
            <div class="topbar-date" id="topDate"></div>
        </div>

        <div class="content">
            <div class="page-title">Dashboard</div>

            <div class="stat-grid">
                <div class="stat-card s-residents" data-bs-toggle="modal" data-bs-target="#residentModal">
                    <div class="stat-num">{{ $residents }}</div>
                    <div class="stat-label">Total Residents</div>
                    <div class="stat-hint">Click to view list</div>
                </div>
                <div class="stat-card s-certificates" data-bs-toggle="modal" data-bs-target="#certificateModal">
                    <div class="stat-num">{{ $certs }}</div>
                    <div class="stat-label">Certificates</div>
                    <div class="stat-hint">Click to view list</div>
                </div>
            </div>

            <div class="chart-card">
                <div class="chart-title">Overview</div>
                <div class="chart-sub">Residents vs Certificates</div>
                <div style="width: 300px; height: 300px; margin: 0 auto;">
                    <canvas id="barChart"></canvas>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="residentModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius: 10px; border: 1px solid var(--blue-line);">
                <div class="modal-header" style="border-bottom: 1px solid var(--blue-line); padding: 18px 24px;">
                    <h6 class="modal-title" style="font-weight: 600; color: var(--blue-deep); margin: 0;">Resident List</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="padding: 20px 24px; max-height: 420px; overflow-y: auto;">
                    <table class="modal-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($residentList as $r)
                            <tr>
                                <td>{{ $r->first_name }} {{ $r->last_name }}</td>
                                <td class="td-muted">{{ $r->gender }}</td>
                                <td class="td-muted">{{ $r->purok }}, {{ $r->barangay }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="certificateModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius: 10px; border: 1px solid var(--blue-line);">
                <div class="modal-header" style="border-bottom: 1px solid var(--blue-line); padding: 18px 24px;">
                    <h6 class="modal-title" style="font-weight: 600; color: var(--blue-deep); margin: 0;">Certificate Records</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="padding: 20px 24px; max-height: 420px; overflow-y: auto;">
                    <table class="modal-table">
                        <thead>
                            <tr>
                                <th>Resident</th>
                                <th>Type</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($certificateList as $c)
                            <tr>
                                <td>{{ $c->resident->first_name ?? '' }} {{ $c->resident->last_name ?? '' }}</td>
                                <td class="td-muted">{{ $c->type }}</td>
                                <td class="td-muted">{{ $c->created_at->format('F d, Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('Logout')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('topDate').textContent = new Date().toLocaleDateString('en-PH', {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
        });

        const residents = {{ $residents }};
        const certs     = {{ $certs }};

        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: ['Data'],
                datasets: [
                    {
                        label: 'Residents',
                        data: [residents],
                        backgroundColor: 'rgba(34,85,164,0.75)'
                    },
                    {
                        label: 'Certificates',
                        data: [certs],
                        backgroundColor: 'rgba(46,168,107,0.75)'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: true, position: 'top' }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
    </body>
</html>