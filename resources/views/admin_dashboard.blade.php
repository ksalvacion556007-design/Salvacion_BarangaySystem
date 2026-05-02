<!DOCTYPE html>
<html>
<head>
    <title>Dashboard — Barangay Kingking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
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
            grid-template-columns: repeat(3, 1fr);
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

        .stat-card.s-total     { border-top-color: var(--blue-mid); }
        .stat-card.s-clerk     { border-top-color: #2ea86b; }
        .stat-card.s-secretary { border-top-color: #7c3aed; }

        .stat-num {
            font-size: 48px;
            font-weight: 600;
            line-height: 1;
            color: var(--blue-deep);
            margin-bottom: 8px;
            letter-spacing: -1px;
        }

        .s-clerk .stat-num     { color: #186940; }
        .s-secretary .stat-num { color: #4c1d95; }

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

        /* CHART */
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
        .staff-list-role {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 20px;
        }

        .role-clerk     { background: #ddeaff; color: var(--blue-mid); }
        .role-secretary { background: #ede9fe; color: #4c1d95; }

        .modal-empty {
            text-align: center;
            color: var(--muted);
            font-style: italic;
            padding: 20px 0;
            font-size: 13px;
        }
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
            <a href="/admin/dashboard" class="nav-item active">Dashboard</a>
            <a href="/admin/staff" class="nav-item">Staff Accounts</a>
            <a href="/admin/reports" class="nav-item">Reports</a>
        </nav>
        <div class="sidebar-foot">
            <div style="font-size: 12px; color: rgba(255,255,255,0.45); margin-bottom: 8px; line-height: 1.4;">
                <div style="font-size: 10px; letter-spacing: 1px; text-transform: uppercase; color: rgba(255,255,255,0.22); margin-bottom: 3px;"></div>
                <div style="font-weight: 500; color: rgba(255,255,255,0.7);">
                    {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                </div>
                <div style="font-size: 10.5px; color: rgba(255,255,255,0.35); text-transform: capitalize;">
                    {{ auth()->user()->role }}
                </div>
            </div>
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
                <div class="stat-card s-total" data-bs-toggle="modal" data-bs-target="#staffModal" data-type="total">
                    <div class="stat-num">{{ $total ?? 0 }}</div>
                    <div class="stat-label">Total Staff</div>
                    <div class="stat-hint">Click to view list</div>
                </div>
                <div class="stat-card s-clerk" data-bs-toggle="modal" data-bs-target="#staffModal" data-type="clerk">
                    <div class="stat-num">{{ $clerkCount ?? 0 }}</div>
                    <div class="stat-label">Clerks</div>
                    <div class="stat-hint">Click to view list</div>
                </div>
                <div class="stat-card s-secretary" data-bs-toggle="modal" data-bs-target="#staffModal" data-type="secretary">
                    <div class="stat-num">{{ $secretaryCount ?? 0 }}</div>
                    <div class="stat-label">Secretaries</div>
                    <div class="stat-hint">Click to view list</div>
                </div>
            </div>

            <div class="chart-card">
                <div class="chart-title">Staff by Role</div>
                <div class="chart-sub">Secretary vs Clerk breakdown</div>
                <div style="width: 300px; height: 300px; margin: 0 auto;">
                    <canvas id="roleChart"></canvas>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="staffModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 10px; border: 1px solid var(--blue-line);">
                <div class="modal-header" style="border-bottom: 1px solid var(--blue-line); padding: 18px 24px;">
                    <h6 class="modal-title" id="modalTitle" style="font-weight: 600; color: var(--blue-deep); margin: 0;"></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="padding: 20px 24px; max-height: 400px; overflow-y: auto;">
                    <div id="modalContent"></div>
                </div>
            </div>
        </div>
    </div>

    @include('Logout')

    <script>
        const staffData = {
            total:     @json($totalList ?? []),
            clerk:     @json($clerkList ?? []),
            secretary: @json($secretaryList ?? [])
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        document.getElementById('topDate').textContent = new Date().toLocaleDateString('en-PH', {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
        });

        new Chart(document.getElementById('roleChart'), {
            type: 'pie',
            data: {
                labels: ['Secretary', 'Clerk'],
                datasets: [{
                    data: [{{ $secretaryCount ?? 0 }}, {{ $clerkCount ?? 0 }}],
                    backgroundColor: ['#7c3aed', '#2255a4'],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });

        const titles = {
            total:     'All Staff',
            clerk:     'Clerks',
            secretary: 'Secretaries'
        };

        document.getElementById('staffModal').addEventListener('show.bs.modal', function (e) {
            const type = e.relatedTarget.getAttribute('data-type');
            const list = staffData[type] || [];

            document.getElementById('modalTitle').textContent = titles[type];

            if (list.length === 0) {
                document.getElementById('modalContent').innerHTML = '<div class="modal-empty">No staff found.</div>';
                return;
            }

            document.getElementById('modalContent').innerHTML = list.map(u => `
                <div class="staff-list-item">
                    <span class="staff-list-name">
                        ${u.first_name} ${u.middle_name ? u.middle_name[0] + '.' : ''} ${u.last_name}
                    </span>
                    <span class="staff-list-role ${u.role === 'clerk' ? 'role-clerk' : 'role-secretary'}">
                        ${u.role.charAt(0).toUpperCase() + u.role.slice(1)}
                    </span>
                </div>
            `).join('');
        });
    </script>
</body>
</html>