<!DOCTYPE html>
<html>
<head>
    <title>Archive — Barangay Kingking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
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
            top: 0;
            left: 0;
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

        .nav-item:hover {
            color: rgba(255,255,255,0.85);
            background: rgba(255,255,255,0.04);
        }

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

        .breadcrumb {
            font-size: 12px;
            color: var(--muted);
        }

        .breadcrumb b {
            color: var(--blue-deep);
            font-weight: 500;
        }

        .topbar-date {
            font-size: 11.5px;
            color: var(--muted);
        }

        .content {
            padding: 40px;
            flex: 1;
        }

        .page-header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .page-title {
            font-size: 22px;
            font-weight: 600;
            color: var(--blue-deep);
        }

        .type-switcher {
            display: flex;
            gap: 6px;
        }

        .type-btn {
            padding: 7px 18px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.6px;
            border-radius: 6px;
            border: 1.5px solid var(--blue-line);
            background: var(--white);
            color: var(--muted);
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            text-decoration: none;
            transition: background 0.15s, border-color 0.15s, color 0.15s;
        }

        .type-btn:hover {
            background: var(--blue-pale);
            border-color: var(--blue-light);
            color: var(--blue-mid);
        }

        .type-btn.active {
            background: var(--blue-deep);
            border-color: var(--blue-deep);
            color: var(--white);
        }

        .archive-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
            border: 1px solid var(--blue-line);
            border-radius: 8px;
            overflow: hidden;
        }

        .archive-table thead {
            background: var(--blue-pale);
        }

        .archive-table thead th {
            padding: 12px 20px;
            font-size: 10.5px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--blue-mid);
            text-align: left;
            border-bottom: 1px solid var(--blue-line);
        }

        .archive-table tbody tr {
            border-bottom: 1px solid var(--blue-line);
            transition: background 0.1s;
        }

        .archive-table tbody tr:last-child { border-bottom: none; }
        .archive-table tbody tr:hover { background: var(--blue-frost); }

        .archive-table tbody td {
            padding: 13px 20px;
            font-size: 13.5px;
            color: var(--text);
            vertical-align: middle;
        }

        .td-name { font-weight: 500; color: var(--blue-deep); }
        .td-meta { color: var(--muted); font-size: 12.5px; }

        .badge {
            display: inline-block;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 20px;
        }

        .badge-cert { background: #ddeaff; color: var(--blue-mid); }

        .act-link {
            display: inline-block;
            font-size: 11.5px;
            font-weight: 500;
            color: #156835;
            background: #d8f5e8;
            border: 1.5px solid #b2e6c8;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            padding: 5px 13px;
            text-decoration: none;
            transition: background 0.15s, border-color 0.15s, color 0.15s;
        }

        .act-link:hover {
            background: #b2e6c8;
            border-color: #7dcca0;
            color: #0e4a26;
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

        .page-btn.active {
            background: var(--blue-deep);
            border-color: var(--blue-deep);
            color: var(--white);
        }

        .page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .page-label {
            font-size: 12px;
            color: var(--muted);
            font-family: 'DM Sans', sans-serif;
            padding: 0 12px;
            line-height: 32px;
            display: inline-block;
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
            <a href="/staff/reports"class="nav-item">Reports</a>
            <a href="/staff/archive"class="nav-item active">Archive</a>
        </nav>
        <div class="sidebar-foot">
            <button class="nav-logout" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
        </div>
    </div>

    <div class="main-wrap">

        <div class="topbar">
            <div class="breadcrumb">Barangay System &nbsp;/&nbsp; <b>Archive</b></div>
            <div class="topbar-date" id="topDate"></div>
        </div>

        <div class="content">

            <div class="page-header-row">
                <div class="page-title">Archive</div>
                <!-- TYPE SWITCHER (replaces the original dropdown, same GET behaviour) -->
                <div class="type-switcher">
                    <a href="?type=residents"
                    class="type-btn {{ $type == 'residents' ? 'active' : '' }}">
                        Residents
                    </a>
                    <a href="?type=certificates"
                    class="type-btn {{ $type == 'certificates' ? 'active' : '' }}">
                        Certificates
                    </a>
                </div>
            </div>

            @if($type == 'residents')
            <table class="archive-table" id="archiveTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Archived By</th>
                        <th>Date Archived</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="archiveTableBody">
                    @foreach($residents as $r)
                    <tr class="archive-row">
                        <td class="td-name">
                            {{ $r->first_name }}
                            {{ $r->middle_name ? strtoupper(substr($r->middle_name,0,1)).'.' : '' }}
                            {{ $r->last_name }}
                        </td>
                        <td class="td-meta">
                            {{ optional($r->archiver)->first_name }}
                            {{ optional($r->archiver)->last_name }}
                        </td>
                        <td class="td-meta">{{ optional($r->deleted_at)->format('F d, Y') }}</td>
                        <td>
                            <form method="POST" action="/staff/archive/restore/resident/{{ $r->id }}"
                                onsubmit="return confirm('Restore {{ $r->first_name }} {{ $r->last_name }}?')">
                                @csrf
                                <button type="submit" class="act-link">Restore</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif


            @if($type == 'certificates')
            <table class="archive-table" id="archiveTable">
                <thead>
                    <tr>
                        <th>Resident</th>
                        <th>Type</th>
                        <th>Issued By</th>
                        <th>Date Archived</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="archiveTableBody">
                    @foreach($certificates as $c)
                    <tr class="archive-row">
                        <td class="td-name">
                            {{ optional($c->resident)->first_name }}
                            {{ optional($c->resident)->middle_name ? strtoupper(substr(optional($c->resident)->middle_name,0,1)).'.' : '' }}
                            {{ optional($c->resident)->last_name }}
                        </td>
                        <td>
                            <span class="badge badge-cert">{{ $c->type }}</span>
                        </td>
                        <td class="td-meta">
                            {{ optional($c->issuer)->first_name }}
                            {{ optional($c->issuer)->middle_name ? strtoupper(substr(optional($c->issuer)->middle_name,0,1)).'.' : '' }}
                            {{ optional($c->issuer)->last_name }}
                        </td>
                        <td class="td-meta">{{ optional($c->deleted_at)->format('F d, Y') }}</td>
                        <td>
                            <form method="POST" action="/staff/archive/restore/certificate/{{ $c->id }}"
                                onsubmit="return confirm('Restore this certificate?')">
                                @csrf
                                <button type="submit" class="act-link">Restore</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            <div class="pagination-wrap">
                <div class="pagination-info" id="pageInfo"></div>
                <div class="pagination-controls" id="pageControls"></div>
            </div>

        </div>
    </div>

    @include('Logout')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('topDate').textContent = new Date().toLocaleDateString('en-PH', {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
        });

        const rowsPerPage = 10;
        let currentPage  = 1;

        const allRows   = Array.from(document.querySelectorAll('.archive-row'));
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

            const from    = totalRows === 0 ? 0 : start + 1;
            const showing = Math.min(end, totalRows);

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
            label.className = 'page-label';
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