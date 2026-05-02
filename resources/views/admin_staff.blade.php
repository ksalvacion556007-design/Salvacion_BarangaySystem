<!DOCTYPE html>
<html>
<head>
    <title>Staff Accounts — Barangay Kingking</title>
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

        .btn-add-staff {
            background: var(--blue-deep);
            color: var(--white);
            border: none;
            border-radius: 6px;
            padding: 9px 20px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.2s;
        }

        .btn-add-staff:hover { background: var(--blue-mid); }

        .staff-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
            border: 1px solid var(--blue-line);
            border-radius: 8px;
            overflow: hidden;
        }

        .staff-table thead {
            background: var(--blue-pale);
        }

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

        .td-name { font-weight: 500; color: var(--blue-deep); }
        .td-email { color: var(--muted); font-size: 12.5px; }

        .badge {
            display: inline-block;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 20px;
        }

        .badge-clerk     { background: #ddeaff; color: var(--blue-mid); }
        .badge-secretary { background: #d8f5e8; color: #156835; }
        .badge-active    { background: #d8f5e8; color: #156835; }
        .badge-inactive  { background: #fef3d8; color: #8a5000; }

        .act-link {
            display: inline-block;
            font-size: 11.5px;
            font-weight: 500;
            color: var(--blue-mid);
            background: var(--blue-pale);
            border: 1.5px solid var(--blue-line);
            border-radius: 5px;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            padding: 5px 13px;
            text-decoration: none;
            transition: background 0.15s, border-color 0.15s, color 0.15s;
        }

        .act-link:hover {
            background: var(--blue-line);
            color: var(--blue-deep);
            border-color: var(--blue-light);
        }

        .act-link.danger {
            color: #c0392b;
            background: #fff0f0;
            border-color: #f5c6c6;
        }

        .act-link.danger:hover {
            background: #ffe0e0;
            border-color: #e08080;
            color: #8b1a1a;
        }

        .action-btns {
            display: flex;
            align-items: center;
            gap: 8px;
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

        .modal-content {
            border: none;
            border-radius: 10px;
            box-shadow: 0 20px 60px rgba(26,58,107,0.15);
        }

        .modal-header {
            border-bottom: 1px solid var(--blue-line);
            padding: 24px 32px 16px;
        }

        .modal-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--blue-deep);
        }

        .modal-body {
            padding: 24px 32px;
        }

        .modal-footer {
            border-top: 1px solid var(--blue-line);
            padding: 14px 32px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 20px;
        }

        .form-grid .form-full {
            grid-column: 1 / -1;
        }

        .f-label {
            display: block;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .f-input {
            width: 100%;
            border: 1.5px solid var(--blue-line);
            border-radius: 6px;
            padding: 9px 12px;
            font-size: 13.5px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            outline: none;
            background: transparent;
            transition: border-color 0.2s;
            margin-bottom: 16px;
        }

        .f-input:focus {
            border-color: var(--blue-light);
            box-shadow: 0 0 0 3px rgba(74,128,212,0.1);
        }

        .f-input::placeholder { color: #b8c9e4; }

        .btn-modal-cancel {
            background: transparent;
            border: 1.5px solid var(--blue-line);
            border-radius: 6px;
            font-family: 'DM Sans', sans-serif;
            font-size: 12px;
            font-weight: 500;
            color: var(--muted);
            padding: 8px 20px;
            cursor: pointer;
            transition: background 0.15s;
        }

        .btn-modal-cancel:hover { background: var(--blue-frost); }

        .btn-modal-save {
            background: var(--blue-deep);
            color: var(--white);
            border: none;
            border-radius: 6px;
            font-family: 'DM Sans', sans-serif;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            padding: 9px 22px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-modal-save:hover { background: var(--blue-mid); }
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
            <a href="/admin/dashboard" class="nav-item">Dashboard</a>
            <a href="/admin/staff" class="nav-item active">Staff Accounts</a>
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
            <div class="breadcrumb">Barangay System &nbsp;/&nbsp; <b>Staff Accounts</b></div>
            <div class="topbar-date" id="topDate"></div>
        </div>

        <div class="content">

            <div class="page-header-row">
                <div class="page-title">Staff Accounts</div>
                <button class="btn-add-staff" data-bs-toggle="modal" data-bs-target="#addStaff">
                    + Add Staff
                </button>
            </div>

            <table class="staff-table" id="staffTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="staffTableBody">
                    @foreach($staff as $user)
                    <tr class="staff-row">
                        <td class="td-name">
                            {{ $user->first_name }}
                            {{ $user->middle_name ? strtoupper(substr($user->middle_name,0,1)).'.' : '' }}
                            {{ $user->last_name }}
                        </td>
                        <td class="td-email">{{ $user->email }}</td>
                        <td>
                            <span class="badge {{ $user->role === 'clerk' ? 'badge-clerk' : 'badge-secretary' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $user->status === 'active' ? 'badge-active' : 'badge-inactive' }}">
                                {{ ucfirst($user->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="action-btns">
                                <button class="act-link"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editStaffModal"
                                    onclick='fillEditModal(@json($user))'>
                                    Edit
                                </button>
                                <form action="/admin/staff/delete/{{ $user->id }}" method="POST" style="display:inline;"
                                    onsubmit="return confirm('Permanently delete {{ $user->first_name }} {{ $user->last_name }}?')">
                                    @csrf
                                    <button type="submit" class="act-link danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination-wrap">
                <div class="pagination-info" id="pageInfo"></div>
                <div class="pagination-controls" id="pageControls"></div>
            </div>
        </div>
    </div>

    @include('Logout')

    <div class="modal fade" id="addStaff" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
            <form method="POST" action="/admin/staff" autocomplete="off" id="addStaffForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Staff Member</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-grid">

                            <div>
                                <label class="f-label">First Name</label>
                                <input name="first_name" class="f-input" placeholder="First name" required>
                            </div>

                            <div>
                                <label class="f-label">Middle Name <span style="color:#b8c9e4;font-size:9px;">(optional)</span></label>
                                <input name="middle_name" class="f-input" placeholder="Middle name">
                            </div>

                            <div>
                                <label class="f-label">Last Name</label>
                                <input name="last_name" class="f-input" placeholder="Last name" required>
                            </div>

                            <div>
                                <label class="f-label">Email Address</label>
                                <input name="email" type="email" class="f-input" placeholder="email@example.com" autocomplete="new-email" required>
                            </div>

                            <div>
                                <label class="f-label">Role</label>
                                <select name="role" class="f-input" required>
                                    <option value="" disabled selected>Select role</option>
                                    <option value="clerk">Clerk</option>
                                    <option value="secretary">Secretary</option>
                                </select>
                            </div>

                            <div></div>

                            <div>
                                <label class="f-label">Password</label>
                                <div class="input-group mb-0">
                                    <input name="password" type="password" class="f-input" style="margin-bottom:0;border-radius:6px 0 0 6px;" placeholder="Password" autocomplete="new-password" required>
                                    <button type="button" class="btn btn-outline-secondary" style="border-color:var(--blue-line);" onclick="togglePassword(this)">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div>
                                <label class="f-label">Confirm Password</label>
                                <div class="input-group mb-0">
                                    <input name="password_confirmation" type="password" class="f-input" style="margin-bottom:0;border-radius:6px 0 0 6px;" placeholder="Confirm password" autocomplete="new-password" required>
                                    <button type="button" class="btn btn-outline-secondary" style="border-color:var(--blue-line);" onclick="togglePassword(this)">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer gap-2">
                        <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-modal-save">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editStaffModal">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Staff Member</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-grid">

                            <div>
                                <label class="f-label">First Name</label>
                                <input id="edit_first_name" name="first_name" class="f-input" placeholder="First name" required>
                            </div>

                            <div>
                                <label class="f-label">Middle Name <span style="color:#b8c9e4;font-size:9px;">(optional)</span></label>
                                <input id="edit_middle_name" name="middle_name" class="f-input" placeholder="Middle name">
                            </div>

                            <div>
                                <label class="f-label">Last Name</label>
                                <input id="edit_last_name" name="last_name" class="f-input" placeholder="Last name" required>
                            </div>

                            <div>
                                <label class="f-label">Email Address</label>
                                <input id="edit_email" name="email" type="email" class="f-input" required>
                            </div>

                            <div>
                                <label class="f-label">Role</label>
                                <select id="edit_role" name="role" class="f-input" required>
                                    <option value="clerk">Clerk</option>
                                    <option value="secretary">Secretary</option>
                                </select>
                            </div>

                            <div>
                                <label class="f-label">New Password <span style="color:#b8c9e4;font-size:9px;">(optional)</span></label>
                                <div class="input-group mb-0">
                                    <input id="edit_password" name="password" type="password" class="f-input" style="margin-bottom:0;border-radius:6px 0 0 6px;" placeholder="Leave blank to keep current">
                                    <button type="button" class="btn btn-outline-secondary" style="border-color:var(--blue-line);" onclick="togglePassword(this)">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer gap-2">
                        <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-modal-save">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('topDate').textContent = new Date().toLocaleDateString('en-PH', {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
        });

        const rowsPerPage = 15;
        let currentPage  = 1;

        const allRows = Array.from(document.querySelectorAll('.staff-row'));
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

            const showing = Math.min(end, totalRows);
            const from    = totalRows === 0 ? 0 : start + 1;

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

        function fillEditModal(user) {
            document.getElementById('edit_first_name').value= user.first_name;
            document.getElementById('edit_middle_name').value= user.middle_name ?? '';
            document.getElementById('edit_last_name').value= user.last_name;
            document.getElementById('edit_email').value= user.email;
            document.getElementById('edit_role').value= user.role;
            document.getElementById('editForm').action= '/admin/staff/' + user.id;
        }

        function togglePassword(btn) {
            const input = btn.previousElementSibling;
            const icon  = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }

        document.getElementById('addStaff').addEventListener('show.bs.modal', function() {
            document.getElementById('addStaffForm').reset();
        });
    </script>
</body>
</html>