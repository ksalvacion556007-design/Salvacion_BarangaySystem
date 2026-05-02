<!DOCTYPE html>
<html>
<head>
    <title>Reports — Barangay Kingking</title>
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
            margin-bottom: 28px;
        }

        .section-box {
            background: var(--white);
            border: 1px solid var(--blue-line);
            border-radius: 8px;
            padding: 24px 28px;
            margin-bottom: 24px;
        }

        .section-box-title {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 16px;
            text-align: center;
        }

        .filter-date-row {
            display: flex;
            align-items: flex-end;
            gap: 14px;
            justify-content: center;
        }

        .filter-btn-row {
            display: flex;
            gap: 10px;
            margin-top: 16px;
            justify-content: center;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .filter-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: var(--muted);
        }

        .filter-input {
            border: 1.5px solid var(--blue-line);
            border-radius: 6px;
            padding: 8px 12px;
            font-size: 13px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            outline: none;
            transition: border-color 0.2s;
            background: var(--white);
        }

        .filter-input:focus {
            border-color: var(--blue-light);
            box-shadow: 0 0 0 3px rgba(74,128,212,0.1);
        }

        .btn-filter {
            background: var(--blue-deep);
            color: var(--white);
            border: none;
            border-radius: 6px;
            padding: 8px 20px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.2s;
        }

        .btn-filter:hover { background: var(--blue-mid); }

        .btn-reset {
            background: transparent;
            color: var(--muted);
            border: 1.5px solid var(--blue-line);
            border-radius: 6px;
            padding: 8px 16px;
            font-size: 12px;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background 0.15s;
        }

        .btn-reset:hover { background: var(--blue-frost); color: var(--muted); }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--white);
            border: 1px solid var(--blue-line);
            border-radius: 8px;
            padding: 22px 24px;
            border-top: 3px solid var(--blue-line);
        }

        .stat-card.s-residents    { border-top-color: var(--blue-mid); }
        .stat-card.s-certificates { border-top-color: #2ea86b; }
        .stat-card.s-logs         { border-top-color: #7c3aed; }

        .stat-num {
            font-size: 40px;
            font-weight: 600;
            line-height: 1;
            color: var(--blue-deep);
            margin-bottom: 6px;
            letter-spacing: -1px;
        }

        .s-certificates .stat-num { color: #186940; }
        .s-logs .stat-num         { color: #4c1d95; }

        .stat-label {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--muted);
        }

        .btn-print {
            background: transparent;
            border: 1.5px solid var(--blue-mid);
            color: var(--blue-mid);
            border-radius: 6px;
            padding: 9px 20px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.2s, color 0.2s;
            margin-bottom: 20px;
        }

        .btn-print:hover { background: var(--blue-mid); color: var(--white); }
        .section-head { margin-bottom: 14px; }

        .section-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--blue-deep);
        }

        .section-sub {
            font-size: 12px;
            color: var(--muted);
            margin-top: 2px;
        }

        .staff-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
            border: 1px solid var(--blue-line);
            border-radius: 8px;
            overflow: hidden;
        }

        .staff-table thead { background: var(--blue-pale); }

        .staff-table thead th {
            padding: 12px 20px;
            font-size: 10.5px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--blue-mid);
            text-align: left;
            border-bottom: 1px solid var(--blue-line);
        }

        .staff-table tbody tr {
            border-bottom: 1px solid var(--blue-line);
            transition: background 0.1s;
        }

        .staff-table tbody tr:last-child { border-bottom: none; }
        .staff-table tbody tr:hover { background: var(--blue-frost); }

        .staff-table tbody td {
            padding: 13px 20px;
            font-size: 13.5px;
            color: var(--text);
            vertical-align: middle;
        }

        .td-muted { color: var(--muted); font-size: 12.5px; }

        .empty-row td {
            color: var(--muted);
            font-size: 13px;
            font-style: italic;
        }

        .pagination-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 18px;
        }

        .pagination-info {
            font-size: 12px;
            color: var(--muted);
        }

        .pagination-controls {
            display: flex;
            gap: 4px;
            align-items: center;
        }

        .page-btn {
            min-width: 32px;
            height: 32px;
            border: 1.5px solid var(--blue-line);
            background: var(--white);
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
            color: var(--blue-mid);
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.15s, border-color 0.15s;
            padding: 0 10px;
        }

        .page-btn:hover {
            background: var(--blue-pale);
            border-color: var(--blue-light);
        }

        .page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .print-section { display: none; }

        @media print {
            body * { visibility: hidden; }
            .print-section, .print-section * { visibility: visible; }
            .print-section {
                display: block;
                position: absolute;
                left: 0; top: 0;
                width: 100%;
                padding: 40px;
                font-family: "Times New Roman", serif;
                color: #000;
                font-size: 13px;
            }
            .no-print, .sidebar { display: none !important; }
            @page {
                margin: 1in;
                @bottom-center {
                    content: "Page " counter(page) " of " counter(pages);
                    font-family: "Times New Roman", serif;
                    font-size: 11px;
                }
            }
            .print-section table { width: 100%; border-collapse: collapse; font-size: 12px; }
            .print-section table th, .print-section table td { border: 1px solid #000; padding: 6px 10px; }
            .print-section table th { background: #f0f0f0 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; font-weight: bold; text-align: center; }
            .print-divider { border: none; border-top: 1.5px solid #000; margin: 8px 0; }
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
            <a href="/staff/dashboard"class="nav-item">Dashboard</a>
            <a href="/staff/residents"class="nav-item">Residents</a>
            <a href="/staff/certificates"class="nav-item">Certificates</a>
            <a href="/staff/reports"class="nav-item active">Reports</a>
            <a href="/staff/archive"class="nav-item">Archive</a>
        </nav>
        <div class="sidebar-foot">
            <button class="nav-logout" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
        </div>
    </div>

    <div class="main-wrap">

        <div class="topbar">
            <div class="breadcrumb">Barangay System &nbsp;/&nbsp; <b>Reports</b></div>
            <div class="topbar-date" id="topDate"></div>
        </div>

        <div class="content">

            <div class="page-title">Reports</div>

            <!-- FILTER BOX -->
            <div class="section-box no-print">
                <div class="section-box-title">Filter by Date</div>
                <form method="GET">
                    <div class="filter-date-row">
                        <div class="filter-group">
                            <span class="filter-label">From</span>
                            <input type="date" name="from" class="filter-input" value="{{ request('from') }}">
                        </div>
                        <div class="filter-group">
                            <span class="filter-label">To</span>
                            <input type="date" name="to" class="filter-input" value="{{ request('to') }}">
                        </div>
                    </div>
                    <div class="filter-btn-row">
                        <button type="submit" class="btn-filter">Filter</button>
                        <a href="/staff/reports" class="btn-reset">Reset</a>
                    </div>
                </form>
            </div>

            <div class="stat-grid no-print">
                <div class="stat-card s-residents">
                    <div class="stat-num">{{ $totalResidents }}</div>
                    <div class="stat-label">Total Residents</div>
                </div>
                <div class="stat-card s-certificates">
                    <div class="stat-num">{{ $totalCertificates }}</div>
                    <div class="stat-label">Total Certificates</div>
                </div>
                <div class="stat-card s-logs">
                    <div class="stat-num">{{ $logs->count() }}</div>
                    <div class="stat-label">Total Logs</div>
                </div>
            </div>

            <div class="no-print" style="margin-bottom: 20px;">
                <button onclick="window.print()" class="btn-print">🖨️ &nbsp;Print / Save PDF</button>
            </div>

            <div class="section-head no-print">
                <div class="section-title">Transaction Logs</div>
                <div class="section-sub">All recorded staff activity</div>
            </div>

            <table class="staff-table no-print" id="logsTable">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Issued By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="logsTableBody">
                    @forelse($logs as $log)
                    <tr class="log-row">
                        <td class="td-muted">{{ $log->created_at->format('F d, Y h:i A') }}</td>
                        <td>{{ optional($log->user)->first_name }} {{ optional($log->user)->last_name }}</td>
                        <td>{{ $log->action }}</td>
                    </tr>
                    @empty
                    <tr class="empty-row">
                        <td colspan="3">No logs found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="pagination-wrap no-print">
                <div class="pagination-info" id="pageInfo"></div>
                <div class="pagination-controls" id="pageControls"></div>
            </div>

            <div class="print-section">
                <div style="text-align:center; margin-bottom:6px;">
                    <div style="font-size:12px; letter-spacing:1px;">Republic of the Philippines</div>
                    <div style="font-size:12px;">Province of Davao de Oro &bull; Municipality of Pantukan</div>
                    <div style="font-size:15px; font-weight:bold; margin-top:4px;">BARANGAY KINGKING</div>
                </div>
                <hr class="print-divider">
                <div style="text-align:center; margin: 10px 0 16px;">
                    <div style="font-size:16px; font-weight:bold; text-transform:uppercase; letter-spacing:2px;">
                        Barangay Transaction Report
                    </div>
                    @if(request('from') || request('to'))
                    <div style="font-size:12px; margin-top:4px;">
                        Period:
                        {{ request('from') ? \Carbon\Carbon::parse(request('from'))->format('F d, Y') : 'Beginning' }}
                        &mdash;
                        {{ request('to') ? \Carbon\Carbon::parse(request('to'))->format('F d, Y') : 'Present' }}
                    </div>
                    @endif
                </div>
                <div style="margin-bottom: 18px; text-align:center;">
                    <table style="width:50%; margin: 0 auto;">
                        <tr>
                            <th style="text-align:left; background:#f0f0f0; padding:6px 10px; border:1px solid #000;">Description</th>
                            <th style="text-align:center; background:#f0f0f0; padding:6px 10px; border:1px solid #000;">Count</th>
                        </tr>
                        <tr>
                            <td style="padding:6px 10px; border:1px solid #000;">Total Registered Residents</td>
                            <td style="text-align:center; padding:6px 10px; border:1px solid #000;">{{ $totalResidents }}</td>
                        </tr>
                        <tr>
                            <td style="padding:6px 10px; border:1px solid #000;">Total Certificates Issued</td>
                            <td style="text-align:center; padding:6px 10px; border:1px solid #000;">{{ $totalCertificates }}</td>
                        </tr>
                        <tr>
                            <td style="padding:6px 10px; border:1px solid #000;">Total Transactions Logged</td>
                            <td style="text-align:center; padding:6px 10px; border:1px solid #000;">{{ $logs->count() }}</td>
                        </tr>
                    </table>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th style="width:25%;">Date &amp; Time</th>
                            <th style="width:25%;">Issued By</th>
                            <th style="width:50%;">Action / Transaction</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                        <tr>
                            <td>{{ $log->created_at->format('F d, Y h:i A') }}</td>
                            <td>{{ optional($log->user)->first_name }} {{ optional($log->user)->last_name }}</td>
                            <td>{{ $log->action }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" style="text-align:center; padding:10px;">No logs found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div style="margin-top: 30px; font-size: 12px;">
                    <hr class="print-divider">
                    <div style="display:flex; justify-content:space-between;">
                        <div>
                            <strong>Printed by:</strong>
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            ({{ auth()->user()->role ?? 'Staff' }})
                        </div>
                        <div>
                            <strong>Date Printed:</strong>
                            <span id="printDate"></span>
                        </div>
                    </div>
                    <div style="margin-top: 4px; font-size:11px; color:#555;">
                        This document is computer-generated and valid without signature unless otherwise required.
                    </div>
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

        document.getElementById('printDate').textContent = new Date().toLocaleDateString('en-PH', {
            year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit'
        });

        const rowsPerPage = 5;
        let currentPage  = 1;

        const allRows   = Array.from(document.querySelectorAll('.log-row'));
        const totalRows = allRows.length;

        function totalPages() {
            return Math.max(1, Math.ceil(totalRows / rowsPerPage));
        }

        function renderTable() {
            const start = (currentPage - 1) * rowsPerPage;
            const end   = start + rowsPerPage;

            allRows.forEach(function(row, index) {
                row.style.display = (index >= start && index < end) ? '' : 'none';
            });

            renderControls();
        }

        function renderControls() {
            const tp   = totalPages();
            const wrap = document.getElementById('pageControls');
            wrap.innerHTML = '';

            const prev = document.createElement('button');
            prev.className = 'page-btn';
            prev.textContent = '←';
            prev.disabled = currentPage === 1;
            prev.addEventListener('click', function() {
                if (currentPage > 1) { currentPage--; renderTable(); }
            });
            wrap.appendChild(prev);

            const label = document.createElement('span');
            label.style.cssText = 'font-size:12px; color:var(--muted); font-family:"DM Sans",sans-serif; padding:0 12px; line-height:32px; display:inline-block;';
            label.textContent = 'Page ' + currentPage + ' of ' + tp;
            wrap.appendChild(label);

            const next = document.createElement('button');
            next.className = 'page-btn';
            next.textContent = '→';
            next.disabled = currentPage === tp;
            next.addEventListener('click', function() {
                if (currentPage < totalPages()) { currentPage++; renderTable(); }
            });
            wrap.appendChild(next);
        }
        renderTable();
    </script>
</body>
</html>